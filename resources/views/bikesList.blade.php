<x-guest-layout>
    @section('content')
        <style>
            li em {
                background: rgba(245, 163, 11, 0.55);
                font-weight: bold;
                padding-left: 8px;
            }
        </style>
        <div class=" p-10 m-4 border-solid border-4">
            {{--            <input class=" top-0 m-4" type="text" id="search-bikes" placeholder="Recherche de vélo, modèle,..."/>--}}
            {{--            <ul id="bike-list">--}}
            {{--                @foreach ($bikes as $bike)--}}
            {{--                    <li class="flex justify-items-end" hidden>--}}
            {{--                        {{$bike->name}}--}}
            {{--                    </li>--}}
            {{--                @endforeach--}}
            {{--            </ul>--}}
            <div>
                <div>
                    @foreach ($bikes as $item)
                        <div class="flex grid grid-cols-4 p-4 border-solide border-2">
                            <ul>
                                <li>{{$item->name}}</li>
                                <li>
                                    @if(isset($item->image))
                                        <img src="{{asset('storage/'. $item->image)}}" alt="{{$item->name}}"
                                             class="w-80">
                                    @endif
                                </li>
                                <li>{{$item->description}}</li>
                                <li>
                                    <span class="rounded bg-orange-400 text-white mx-2 px-2">
                                        {{$item->getMaterial()->name}}
                                    </span>
                                    <span class="rounded bg-orange-400 text-white mx-2 px-2">
                                        {{$item->getCategory()->name}}
                                    </span>
                                    <span class="rounded bg-orange-400 text-white mx-2 px-2">
                                        {{$item->getTrademark()->name}}
                                    </span>
                                </li>
                            </ul>
                        </div>
                    @endforeach</div>
            </div>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>
            $(document).ready(function () {

                /* initially hide product list items */
                $("#bike-list li ").hide();

                /* highlight matches text */
                let highlight = function (string) {
                    $("#bike-list li.match").each(function () {
                        let matchStart = $(this).text().toLowerCase().indexOf("" + string.toLowerCase() + "");
                        let matchEnd = matchStart + string.length - 1;
                        let beforeMatch = $(this).text().slice(0, matchStart);
                        let matchText = $(this).text().slice(matchStart, matchEnd + 1);
                        let afterMatch = $(this).text().slice(matchEnd + 1);
                        $(this).html(beforeMatch + "<em>" + matchText + "</em>" + afterMatch);
                    });
                };


                /* filter products */
                $("#search-bikes").on("keyup click input", function () {
                    if (this.value.length > 0) {
                        $("#bike-list li ").removeClass("match").hide().filter(function () {
                            return $(this).text().toLowerCase().indexOf($("#search-bikes").val().toLowerCase()) != -1;
                        }).addClass("match").show();
                        highlight(this.value);
                        $("#bike-list").show();
                    } else {
                        $("#bike-list, #bike-list li ").removeClass("match").hide();
                    }
                });


            });
        </script>
    @endsection


</x-guest-layout>
