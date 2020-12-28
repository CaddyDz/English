<div class="ui inverted raised segment">
  <form role="form" enctype="multipart/form-data" class="ui inverted form error" @submit.prevent="post">
    <label for="image" class="ui icon button">
      <i class="image icon"></i>
      Add Image
    </label>
    <input type="file" id="image" name="image[]" accept='image/*' style="display:none" multiple>
    <hr>
    	<div class="field{{ $errors->has('status') ? ' has-error' : '' }}">
    		<textarea placeholder="What's up {{ Auth::user()->name }}?" name="body" required id="status" rows="2" cols="40" v-model="status" @keyup="enable">
        </textarea>
    	</div>
  		@if ($errors->has('status'))
  			<span class="help-block">{{ $errors->first('status') }}</span>
  		@endif
      <button type="submit" class="ui primary button" :disabled="is_disabled">Update status</button>
  </form>
</div>
