    <div class="h-100 dk-div-border">
        <div class="dk-f-l h-100 col-4">
        	<div class="row h-50  p-1">
				<img src=" {{$bsobjects[0]->image}} " alt="Изображение" class="w-100">
			</div> 	
			<div class="row h-50 p-1">
				<textarea class="w-100 p-2">
					{{$bsobjects[0]->comment}}
				</textarea> 
			</div>
        </div>
        <div class="p-0 dk-f-l h-100 col-8 dk-text-color">
            <div class="dk-h-10p">
				<h2 class="text-center font-weight-bold">Парикмахерская {{$bsobjects[0]->name_rus}}</h2>
            </div>
            <div class="dk-overflow-auto dk-h-90p p-1">
				<table class="w-100" id="dk-data-table">
					<tr>
						<td class="dk-text-color dk-font-bold dk-text-r px-2">id</td>
						<td colspan="3" class="px-2">1</td>
					</tr>
					<tr>
						<td class="dk-text-color dk-font-bold dk-text-r px-2">Название англ.</td>
						<td class="px-2">{{$bsobjects[0]->name}}</td>
						<td class="dk-text-color dk-font-bold dk-text-r px-2">Название русск.</td>
						<td class="px-2">{{$bsobjects[0]->name_rus}}</td>
					</tr>
					<tr>
						<td class="dk-text-color dk-font-bold dk-text-r px-2">Адрес</td>
						<td class="px-2" colspan="3">{{$bsobjects[0]->address}}</td>
					</tr>					
					<tr>
						<td class="dk-text-color dk-font-bold dk-text-r px-2">Изображение</td>
						<td class="px-2" colspan="3">{{$bsobjects[0]->image}}</td>
					</tr>						
					<tr>
						<td class="dk-text-color dk-font-bold dk-text-r px-2">Создал</td>
						<td class="px-2">{{$bsobjects[0]->creator}}</td>
						<td class="dk-text-color dk-font-bold dk-text-r px-2">Изменил</td>
						<td class="px-2">{{$bsobjects[0]->last_modifer}}</td>
					</tr>					
					<tr>
						<td class="dk-text-color dk-font-bold dk-text-r px-2">Дата создания</td>
						<td class="px-2">{{$bsobjects[0]->created_at}}</td>
						<td class="dk-text-color dk-font-bold dk-text-r px-2">Дата изменения</td>
						<td class="px-2">{{$bsobjects[0]->updated_at}}</td>
					</tr>
				</table>				
            </div>
        </div>   
    </div>
