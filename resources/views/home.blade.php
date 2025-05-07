@extends('dbcopy::layouts.app', ['docTitle' => 'Choose table', 'pageTitle' => 'Tables'])

@section('content')
    <div class="mx-4">
        <livewire:dbcopy::tables-list lazy="on-load"/>
    </div>
@endsection
