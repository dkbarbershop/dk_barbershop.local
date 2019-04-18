    <div class="h-100 dk-div-border p-1">
        <div class="dk-f-l h-100 col-4 p-0 dk-overflow-auto">
        	<div class=" h-50 m-0 p-0 form-control">
				<h4 class="text-center pt-2 d-none dk-input-field"> Изображение</h4>
				<p class="text-center d-none dk-input-field"><button type="button" class="btn btn-outline-dark dk-w-image-button">Обзор 350х150</button></p>
				<p class="text-center d-none dk-input-field"><button type="button" class="btn btn-outline-dark dk-w-image-button">Загрузить</button></p>
				<img id="objImage" src=" {{$bsobjects[0]->image}} " alt="Изображение" class="w-100 h-100 dk-text-info ">
			</div> 	
			<div class="h-50 p-0 form-control">
				<textarea id="new_comment" class="w-100 h-100 dk-noresize form-control dk-input-field d-none">
				</textarea> 
				<textarea id="сomment" class="w-100 h-100 dk-noresize form-control dk-n-edit dk-text-info">
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
            <div class="dk-overflow-auto dk-h-90p pt-1 pl-1">
				<table class="w-100" id="dk-data-table">
					<tr>
						<td class="dk-text-color dk-font-bold dk-text-r px-2">id</td>
						<td id="objId" colspan="3" class="px-2 dk-text-info">{{$bsobjects[0]->id}}</td>
					</tr>
					<tr>
						<td class="dk-text-color dk-font-bold dk-text-r px-2 dk-w-20">Название англ.</td>
						<td class="dk-w-30 px-2 dk-td-input">
							<span id="objName" class="dk-text-info" >{{$bsobjects[0]->name}}</span>
							<input id="name" type="text" class="form-control h-100 py-0 d-none dk-input-field" placeholder="Название англ.">
						</td>
						<td class="dk-text-color dk-font-bold dk-text-r px-2 dk-w-20">Название русск.</td>
						<td class="px-2  dk-w-30 dk-td-input">
							<span class="dk-text-info objNameRus" >{{$bsobjects[0]->name_rus}}</span>
							<input id="name_rus" type="text" class="form-control h-100 py-0 d-none d-none dk-input-field" placeholder="Название русск.">
						</td>
					</tr>
					<tr>
						<td class="dk-text-color dk-font-bold dk-text-r px-2">Адрес</td>
						<td class="px-2 dk-td-input" colspan="3">
							<span id="objAddress"  class="dk-text-info">{{$bsobjects[0]->address}}</span>
							<input id="address" type="text" class="form-control h-100 py-0 d-none d-none dk-input-field" placeholder="Адрес">
						</td>
					</tr>					
					<tr>
						<td class="dk-text-color dk-font-bold dk-text-r px-2">Изображение</td>
						<td id="objImagePath" class="px-2 dk-text-info" colspan="3">{{$bsobjects[0]->image}}</td>
					</tr>						
					<tr>
						<td class="dk-text-color dk-font-bold dk-text-r px-2">Создал</td>
						<td id="objCreator" class="px-2 dk-text-info">{{$bsobjects[0]->creator}}</td>
						<td class="dk-text-color dk-font-bold dk-text-r px-2">Изменил</td>
						<td id="objModifer" class="px-2 dk-text-info">{{$bsobjects[0]->last_modifer}}</td>
					</tr>					
					<tr>
						<td class="dk-text-color dk-font-bold dk-text-r px-2">Дата создания</td>
						<td id="objCreatedAt" class="px-2 dk-text-info">{{$bsobjects[0]->created_at}}</td>
						<td class="dk-text-color dk-font-bold dk-text-r px-2">Дата изменения</td>
						<td id="objUpdatedAt" class="px-2 dk-text-info">{{$bsobjects[0]->updated_at}}</td>
					</tr>
				</table>				
            </div>
        </div>   
    </div>
