// Add CSRF token to ajax requests extracted from the meta tag named csrf-token
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
// Initialize a new vue instance
new Vue({
  el: '#app-wrapper',
  data: {
    is_disabled: true,
    status: '',
  },
  methods: {
    enable: function() {
      if (this.status.length == 0) {
        this.is_disabled = true;
        return;
      }
      this.is_disabled = false;
    },
    post: function(){
      // Get the status body
      axios.post('/statuses', {
        body: this.status
      })
      .then(function (response) {
        // Update the statuses stream
        console.log(this.status);
        this.status = response;
      })
      .catch(function (error) {
        console.log("Couldn't post status because of an error: ", error);
      });
    }
  }
});
// JQuery code to be replaced by Vue code soon
$(document).ready(function() {
  // Enable top right corner dropdown on hover
  $('#profileDropdown')
    .dropdown({
      on: 'hover'
    });
  // Script to auto resize TextArea
  $('textarea').autogrow({
    vertical: true,
    horizontal: false
  });
  // Post statuses through ajax
  $('#postStatus').submit(function(e) {
    var stsBody = $('#status').val();
    var dataString = "body=" + stsBody;
    $.ajax({
      type: "post",
      url: 'statuses',
      data: dataString,
      success: function(data) {
        // Create a post on the fly using the requested data
        $.get('statuses/' + data, function(data) {
          $('#status').val("");
          $('#nullStatuses').remove();
          $('#statusesBlock').prepend(data).fadeIn(500);
        });
      }
    });
  });
  // This is being triggered by button click, should be by form submission
  $(".reply").submit(function(e){
    e.preventDefault();
    var status_id = $(this).data('id');
    $.ajax({
        type: 'POST',
        url: 'status/' + status_id + '/comment',
        data: {
            '_token': $('input[name=_token]').val(),
            'status_id': status_id,
            'replyBody': $('input[name=replyBody-' + status_id + ']').val()
        },
        success: function(data) {
          $('#repliesBlock' + status_id).append(data).fadeIn(500);
          $('input[name=replyBody-' + status_id + ']').val('');
        }
    });
  });
  $("body").on("click", ".deleteStatus", function(e){
    e.preventDefault();
    var status_id = $(this).data('id');
    $.ajax({
        type: 'get',
        url: 'statuses/' + status_id,
        data: {
            'status_id': status_id
        },
        success: function(data) {
          $('#' + status_id).remove('div');
        }
    });
  });
});
