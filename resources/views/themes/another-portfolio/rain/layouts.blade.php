<div class="w-full mx-auto">
    @if($layout->widgets !== null)
        <div class="grid grid-cols-1 md:grid-cols-12 gap-2 w-full px-2">
            @foreach (\LaraZeus\DynamicDashboard\Models\Columns::all() as $column)
                <div class="w-full {{ $column->class }}">
                    @if(isset($layout->widgets[$column->key]))
                        @php
                            $widgetsItems = collect($layout->widgets[$column->key])->sortBy('data.sort')->toArray();
                        @endphp
                        @foreach($widgetsItems as $key => $data)
                            @if(class_exists($data['data']['widget']))
                                @php
                                    $getWidget = new $data['data']['widget'];
                                @endphp
                                <div class="bg-white dark:bg-black shadow my-10 py-3 px-4 hover:shadow-lg transition-all ease-in-out duration-500">
                                    @if($data['data']['title'])
                                        <h5 class="px-4 py-2 text-center font-bold text-sm lg:text-lg text-primary-500 dark:text-primary-100">
                                            {{ $data['data']['title'] }}
                                        </h5>
                                    @endif
                                    <div>
                                        {!! $getWidget->render($data['data']) !!}
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
