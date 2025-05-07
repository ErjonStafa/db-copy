<?php

namespace Erjon\DbCopy\Views;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class JsonHighlight extends Component
{
    public function __construct(
        public ?Collection $data,
    ) {}

    public function generateHtml()
    {
        return \Erjon\DbCopy\Highlight\JsonHighlight::highlight_string($this->data?->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    /**
     * {@inheritDoc}
     */
    public function render()
    {
        return view('dbcopy::components.json-highlight', [
            'html' => $this->generateHtml(),
        ]);
    }
}
