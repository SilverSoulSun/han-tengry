<div class="import import-photos">
	<form id="form-photos">
	<div class="navbar">
		<div class="wrapper">
			<select class="animals chosen" name="animal_id"></select>
		</div>

		<div class="import-inputs">

			<div class="wrapper">
				<label>Lecense</label>
				<select class="license">
					<option selected="selected" value="4,5,6,7,8,9,10">Commercial allowed</option>
					<option value="1,2,3">Commercial not allowed</option>
					<option value="0">Copyrighted</option>
				</select>
			</div>

			<div class="wrapper">
				<label>Per page</label>
				<select class="per-page">
					<option value="10">10</option>
					<option value="20">20</option>
					<option value="50">50</option>
					<option selected="selected" value="100">100</option>
				</select>
			</div>

			<div class="wrapper">
				<label>Page</label>
				<select class="page-num">
					@for ($i = 1; $i < 11; $i++)
					    <option @if($i == 1) selected="selected" @endif  value="{{ $i }}">{{ $i }}</option>
					@endfor
				</select>
			</div>

			<div class="wrapper">
				<label>Sceintific name:</label>
				<input type="text" class="scientific-name" readonly>
			</div>

			<div class="wrapper">
				<label>Common names:</label>
				<input type="text" class="common-names" readonly>
			</div>

			<div class="wrapper">
				<label>Query:</label>
				<input type="text" class="query" placeholder="query">
			</div>
			
			<div class="wrapper">
			<button type="button" class="btn btn-load-photos">Load photos</button>
			<button type="button" class="btn btn-import-photos">Import selected</button>
			</div>

			<div class="wrapper">
			<div class="total"></div>
			</div>
		</div>
	</div>

	<div class="results photos-list">
		
	</div>
	</form>
</div>
