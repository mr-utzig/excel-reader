<div class="mt-3">
    @if ($arrHeader)
    <form class="border border-2 rounded-2 p-3 bg-white" wire:submit.prevent="process">
        <div class="row">
            <div class="col-md">
                <div>
                    <label for="primaryColumn" class="form-label py-0 mb-1">Selecione a coluna principal:</label>
                    <select id="primaryColumn" class="form-select form-select-sm" wire:model="primaryColumn"
                        aria-label="Seleciona a coluna principal">
                        @foreach ($arrHeader as $index => $header)
                        <option value="{{ $index }}">{{ ucfirst($header) }}</option>
                        @endforeach
                    </select>
                    @error('primaryColumn')
                    <span class="text-danger">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div>
                    <p class="text-start mb-1">Selecione as colunas que se repetem:</p>
                    <ul class="list-group flex-fill">
                        @foreach ($arrHeader as $index => $header)
                        <li class="list-group-item">
                            <input type="checkbox" id="columnsThatRepeat_{{ $index }}" value="{{ $index }}"
                                class="form-check-input me-1" wire:model="columnsThatRepeat.{{ $header }}">
                            <label class="form-check-label stretched-link"
                                for="columnsThatRepeat_{{ $index }}">{{ ucfirst($header) }}</label>
                        </li>
                        @endforeach
                    </ul>
                    @error('columnsThatRepeat')
                    <span class="text-danger">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md">
                <p class="text-start mb-1">Selecione como formatar cada coluna:</p>
                <ul class="list-group">
                    @foreach ($arrHeader as $index => $header)
                    <li class="list-group-item">
                        <div class="row align-items-center">
                            <label for="columnFormat_{{ $header }}"
                                class="col-sm-4 col-form-label py-0">{{ ucfirst($header) }}:</label>
                            <div class="col-sm-8">
                                <select id="columnFormat_{{ $header }}" class="form-select form-select-sm"
                                    wire:model="columnFormat.{{ $header }}"
                                    aria-label="Seleciona a formatacao da coluna">
                                    <option selected>Nenhum</option>
                                    <option value="1">strtoupper</option>
                                    <option value="2">strtolower</option>
                                    <option value="3">ucfirst</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-2">
            <button type="submit" class="btn btn-success">Agora vai!</button>
        </div>
    </form>
    @endif
</div>