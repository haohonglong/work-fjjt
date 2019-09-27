<?php
use app\models\Category as CategoryList;
use yii\widgets\ActiveForm;
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">

            <div class="ibox-content">
                <?php $form = ActiveForm::begin() ?>
                <div class="form-group field-category-parent_id">
                    <?= $form->field($model, 'pid')
                        ->label('pid')
                        ->dropDownList(CategoryList::getAllMap(),['prompt'=>'无父级类别']) ?>

                </div>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'name')->textInput() ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'sort')->textInput() ?>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-primary" type="submit">保存</button>
                        <button class="btn btn-white" type="reset">重置</button>
                    </div>
                </div>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>
</div>
