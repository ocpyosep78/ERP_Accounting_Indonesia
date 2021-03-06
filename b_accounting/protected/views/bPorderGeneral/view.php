<div class="page-header">
	<h1>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/shopcart.png') ?>
		PO:
		<?php echo $model->system_ref; ?>
	</h1>
</div>

<?php 

$this->widget('bootstrap.widgets.BootDetailView', array(
		'data'=>$model,
		'attributes'=>array(
				'input_date',
				'periode_date',
				'system_ref',
				array(
						'label'=>'Purchasing Type',
						'value'=>$model->po_type->name,
				),
				array(
						'label'=>'Budget Comp',
						'value'=>$model->budgetcomp->account_concat(),
				),
				'organization.name',
				array(
						'label'=>'Supplier',
						'value'=>$model->supplier->company_name,
				),
				'remark',
				array(
						'label'=>'Payment Status',
						'value'=>$model->paymentCheck(),
				),
		),
)); ?>

<?php $this->widget('bootstrap.widgets.BootGridView', array(
		'id'=>'bporder-detail-grid',
		'dataProvider'=>bPorderDetail::model()->search($_GET['id']),
		'itemsCssClass'=>'table table-striped table-bordered',
		'template'=>'{items}{pager}{summary}',
		'columns'=>array(
				array(
						'header'=>'Item',
						'value'=>'$data->item_general->account_concat()',
				),
				'description',
				'qty',
				'uom',
				array(
						'value'=>'$data->amountf()',
						'name'=>'amount',
						'htmlOptions'=>array(
								'style'=>'text-align: right; padding-right: 5px;'
						),
				),
				array(
						'header'=>'Total',
						'value'=>'$data->totalf()',
						'name'=>'amount',
						'htmlOptions'=>array(
								'style'=>'text-align: right; padding-right: 5px;'
						),
				),
		),
));
?>
<br />
<b> Total: <?php echo $model->sum_pof(); ?>
</b>
