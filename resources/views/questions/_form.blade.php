@csrf
<div class="form-group">
    <label for="question-title">Question title</label>
    <input type="text" name="title" id="question-title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title', $question->title) }}">
    @if ($errors->has('title'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('title') }}</strong>
        </div>
    @endif
</div>
<div class="form-group">
    <label for="question-text">Describe your question</label>
    <textarea name="text" id="question-text" class="form-control {{ $errors->has('text') ? 'is-invalid' : '' }}" rows="10">{{ old('text', $question->text) }}</textarea>
    @if ($errors->has('text'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('text') }}</strong>
        </div>
    @endif
</div>
<div class="form-group">
    <button type="submit" class="btn btn-outline-primary btn-lg">{{ $buttonText }}</button>
</div>
