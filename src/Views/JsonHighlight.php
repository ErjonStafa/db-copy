<?php

namespace Erjon\DbCopy\Views;

use Illuminate\View\Component;
use Erjon\DbCopy\Highlight\JsonHighlight as Highlighter;

class JsonHighlight extends Component
{
    public function __construct(
        public ?string $jsonData,
    ) {}

    public function generateHtml(): string
    {
        return Highlighter::highlight_string($this->jsonData);
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
