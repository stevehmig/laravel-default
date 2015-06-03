@foreach($modelname::getFormData() as $key=>$attribute)
	@include('partials.form',['type'=>$attribute['type'],'label'=>$modelname::getLabel($key),'id'=>$key,'list'=>array_key_exists("list",$attribute) ? $attribute['list'] : ''])
@endforeach