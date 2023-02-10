<div class="mt-3">
    @if ($arrHeader)
    <form class="border border-2 rounded-2 p-3 bg-white" wire:submit.prevent="process">
        <p class="text-start">Selecione as colunas que se repetem:</p>
        <ul class="list-group flex-fill mt-1">
            @foreach ($arrHeader as $index => $header)
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" id="repeatColumns{{ $index }}">
                <label class="form-check-label stretched-link" for="repeatColumns{{ $index }}">{{ $header }}</label>
            </li>
            @endforeach
        </ul>
        <div class="d-flex justify-content-end mt-2">
            <button type="submit" class="btn btn-success">Agora vai!</button>
        </div>
    </form>
    @endif

    <!-- <div class="accordion accordion-flush" id="accordionFlushSpreadsheet">
        @foreach ($arrRows as $index => $rows)
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-{{ $index }}" aria-expanded="false" aria-controls="flush-{{ $index }}">
                    {{ $rows }}
                </button>
            </h2>
            <div id="flush-{{ $index }}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ $index }}" data-bs-parent="#accordionFlushSpreadsheet">
                <div class="accordion-body">
                    <ul class="list-group">
                        <li class="list-group-item">An item</li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div> -->
</div>