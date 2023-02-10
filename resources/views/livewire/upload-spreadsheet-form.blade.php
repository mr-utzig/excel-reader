<form class="border border-2 rounded-2 p-3 bg-white" wire:submit.prevent="emitFormData">
    <fieldset class="d-flex flex-column">
        <legend>Processar planilha eletrônica:</legend>
        <div>
            <label class="btn btn-secondary me-2" for="spreadsheetFile">
                <i class="bi bi-upload me-2"></i>
                Selecione um arquivo
            </label>
            <input type="file" id="spreadsheetFile" class="visually-hidden" wire:model="spreadsheet"
                wire:change="spreadsheetValidation">
            <div class="spinner-border align-middle" role="status" wire:loading wire:target="spreadsheet">
                <span class="visually-hidden">Carregando...</span>
            </div>
            @error('spreadsheet')
            <span class="text-danger">
                <i class="bi bi-exclamation-triangle-fill"></i>
                {{ $message }}
            </span>
            @enderror
            @if ($spreadsheet && !$errors->has('spreadsheet'))
            <span class="text-success align-middle">
                <i class="bi bi-file-check"></i>
                Arquivo selecionado: <strong>{{ $spreadsheet->getClientOriginalName() }}</strong>
            </span>
            @endif
        </div>
        @if ($spreadsheet && !$errors->has('spreadsheet'))
        <div class="row mt-2">
            <div class="col-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" value="" id="hasNoHeader" wire:model="hasNoHeader">
                    <label class="form-check-label" for="hasNoHeader">Planilha sem cabeçalho</label>
                </div>
            </div>
        </div>
        @if ($hasNoHeader)
        <div class="row mt-2">
            <div class="col-3">
                <div>
                    <label for="spreadsheetHeader" class="form-label">Cabeçalho planilha:</label>
                    <input type="text" class="form-control" id="spreadsheetHeader" wire:model="spreadsheetHeader"
                        wire:keydown.enter.prevent="pushHeader" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md d-flex flex-wrap">
                @foreach ($arrSpreadsheetHeader as $index => $header)
                <span class="badge bg-secondary mx-1 my-1" wire:click="removeHeader({{$index}})">{{ $header }}</span>
                @endforeach
            </div>
        </div>
        @endif
        <div class="d-flex justify-content-end mt-2">
            <button type="submit" class="btn btn-success">Processar planilha</button>
        </div>
        @endif
    </fieldset>
</form>