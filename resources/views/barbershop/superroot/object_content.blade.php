    <div class="h-100 dk-div-border">
        <div class="dk-f-l h-100 col-4">
        	<div class="row h-50  p-1">
				<img id="objImage" src=" {{$bsobjects[0]->image}} " alt="Изображение" class="w-100">
			</div> 	
			<div class="row h-50 p-1">
				<textarea id="objComment" class="w-100 p-2 dk-noresize" >
					{{$bsobjects[0]->comment}}
				</textarea> 
			</div>
        </div>
        <div class="p-0 dk-f-l h-100 col-8 dk-text-color">
            <div class="dk-h-10p">
				<h2 class="text-center font-weight-bold">Парикмахерская 
					<span class="objNameRus">{{$bsobjects[0]->name_rus}}</span>
				</h2>
            </div>
            <div class="dk-overflow-auto dk-h-90p p-1">
				<table class="w-100" id="dk-data-table">
					<tr>
						<td class="dk-text-color dk-font-bold dk-text-r px-2">id</td>
						<td id="objId" colspan="3" class="px-2">{{$bsobjects[0]->id}}</td>
					</tr>
					<tr>
						<td class="dk-text-color dk-font-bold dk-text-r px-2 dk-w-20">Название англ.</td>
						<td id="objName" class="px-2 dk-w-30">{{$bsobjects[0]->name}}</td>
						<td class="dk-text-color dk-font-bold dk-text-r px-2 dk-w-20">Название русск.</td>
						<td class="px-2 objNameRus dk-w-30">{{$bsobjects[0]->name_rus}}</td>
					</tr>
					<tr>
						<td class="dk-text-color dk-font-bold dk-text-r px-2">Адрес</td>
						<td id="objAddress" class="px-2" colspan="3">{{$bsobjects[0]->address}}</td>
					</tr>					
					<tr>
						<td class="dk-text-color dk-font-bold dk-text-r px-2">Изображение</td>
						<td id="objImagePath" class="px-2" colspan="3">{{$bsobjects[0]->image}}</td>
					</tr>						
					<tr>
						<td class="dk-text-color dk-font-bold dk-text-r px-2">Создал</td>
						<td id="objCreator" class="px-2">{{$bsobjects[0]->creator}}</td>
						<td class="dk-text-color dk-font-bold dk-text-r px-2">Изменил</td>
						<td id="objModifer" class="px-2">{{$bsobjects[0]->last_modifer}}</td>
					</tr>					
					<tr>
						<td class="dk-text-color dk-font-bold dk-text-r px-2">Дата создания</td>
						<td id="objCreatedAt" class="px-2">{{$bsobjects[0]->created_at}}</td>
						<td class="dk-text-color dk-font-bold dk-text-r px-2">Дата изменения</td>
						<td id="objUpdatedAt" class="px-2">{{$bsobjects[0]->updated_at}}</td>
					</tr>
				</table>				
            </div>
        </div>   
    </div>
