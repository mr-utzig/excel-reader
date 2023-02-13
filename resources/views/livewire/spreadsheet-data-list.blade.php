<div>
    @if ($dataList)
    <div class="border border-2 rounded-2 p-3 bg-white mt-3 mb-5">
        <div class="d-flex justify-content-end mb-2">
            <button type="button" wire:click="downloadSpreadsheets" class="btn btn-success">Baixar Planilhas</button>
        </div>
        <div class="accordion">
            @foreach ($dataList as $key => $list)
            @foreach ($list as $label => $arrDataItems)
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-{{ $key }}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-{{ $key }}" aria-expanded="false" aria-controls="flush-{{ $key }}">
                        {{ $label }}
                    </button>
                </h2>
                <div id="flush-{{ $key }}" class="accordion-collapse collapse"
                    aria-labelledby="flush-heading{{ $key }}">
                    <div class="accordion-body">
                        @foreach ($arrDataItems as $group => $items)
                        <p class="text-start mb-1">{{ $group }}:</p>
                        <ul class="list-group">
                            @foreach ($items as $item)
                            <li class="list-group-item">{{ $item }}</li>
                            @endforeach
                        </ul>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
            @endforeach
        </div>
    </div>
    @endif
</div>