@if(isset($tp))
		<!-- in case the House -->	
	@if($tp != "la" && $tp != "st")
		<!-- in case not land or house -->
		    <div class="form-group" dir="ltr">
					
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-bed"></i></span>
					<select name="ret_rooms" class="form-control" style="text-align:right;">
							<option option="-1">{{ trans('new.piece') }}</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10+</option>
					</select>
					</div>
				    </div>
				
					<label><input type="checkbox"  name="ret_balc" value="1">  {{ trans('new.balc') }}</label>
					<label><input type="checkbox" name="ret_gara" value="1"> {{ trans('new.gara') }}</label>
					<label><input type="checkbox" name="ret_furn" value="1"> {{ trans('new.furn') }}</label>
	@endif

@endif
