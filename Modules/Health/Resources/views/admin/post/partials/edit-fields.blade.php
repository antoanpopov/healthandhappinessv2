<div class="box-body">
    <div class="box-body">
        <div class='form-group{{ $errors->has("{$lang}.title") ? ' has-error' : '' }}'>
            {!! Form::label("{$lang}[title]", trans('page::pages.form.title')) !!}
            <?php $old = $post->hasTranslation($lang) ? $post->translate($lang)->title : '' ?>
            {!! Form::text("{$lang}[title]", old("{$lang}.title", $old), ['class' => 'form-control', 'placeholder' => trans('page::pages.form.title')]) !!}
            {!! $errors->first("{$lang}.title", '<span class="help-block">:message</span>') !!}
        </div>

        <?php $oldAbstract = $post->hasTranslation($lang) ? $post->translate($lang)->abstract : '' ?>
        <?php $oldContent = $post->hasTranslation($lang) ? $post->translate($lang)->content : '' ?>
        @editor('abstract', trans('health::form.abstract'), old("$lang.body", $oldAbstract), $lang)
        <hr/>
        @editor('content', trans('health::form.content'), old("$lang.content", $oldContent), $lang)

    </div>
</div>
