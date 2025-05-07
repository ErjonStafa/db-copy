<?php

namespace Erjon\DbCopy\Views;

use Illuminate\View\Component;

class JsonHighlight extends Component
{
    public function __construct(
        public ?string $jsonData,
    ) {}

    public function generateHtml()
    {
        return \Erjon\DbCopy\Highlight\JsonHighlight::highlight_string($this->jsonData);
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
