<?php

namespace Erjon\DbCopy\Views;

use Illuminate\View\Component;

class ArrayHighlight extends Component
{
    public function __construct(
        public array $array,
    ) {}

    public function generateHtml(): string
    {
        ini_set('highlight.string', '#880000');
        ini_set('highlight.keyword', '#444444');
        ini_set('highlight.default', '#669955');
        ini_set('highlight.int', '#669955');

        $html = highlight_string(
            "<?php\n".
            'return '.array_export($this->array).
            ';',
            return: true
        );

        // Clean from '<?php' and 'return'
        $html = (string) str_replace("&lt;?php\n", '', $html);

        return (string) str_replace('return ', '', $html);
    }

    /**
     * {@inheritDoc}
     */
    public function render()
    {
        return view('dbcopy::components.array-highlight', [
            'html' => $this->generateHtml(),
        ]);
    }
}
