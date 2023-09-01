<div class="container mx-auto">
    @if($layout->widgets !== null)
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 w-full px-2">
            @foreach (\LaraZeus\Rain\RainPlugin::get()->getColumnsModel()::all() as $column)
                <div class="w-full {{ $column->class }}">
                    @if(isset($layout->widgets[$column->key]))
                        @php
                            $widgetsItems = collect($layout->widgets[$column->key])->sortBy('data.sort')->toArray();
                        @endphp
                        @foreach($widgetsItems as $key => $data)
                            @if(class_exists($data['data']['widget']))
                                @php
                                    $data['data']['key'] = $key;
                                    $getWidget = new $data['data']['widget'];
                                @endphp
                                <div class="card w-full bg-base-100 shadow-xl">
                                    <div class="card-body">
                                        @if($data['data']['title'])
                                            <p class="card-title">Placeholder</p>
                                        @endif
                                        <div>
                                            {!! $getWidget->render($data['data']) !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>
