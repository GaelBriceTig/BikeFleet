@php
    use \Illuminate\Support\Carbon;
@endphp
<x-calendar-layout>
    <div class="grid grid-cols-4 gap-4 mt-4">
        <div class="col-span-4">
            <div id="calendar"></div>
            @php
                {{echo(\App\Helpers\HtmlHelper::calendar(Carbon::createFromDate(date('d-m-Y'))));}}
            @endphp
        </div>
    </div>
    <style>
        .calendar {
            display: flex;
            position: relative;
            padding: 16px;
            margin: 0 auto;
            max-width: 320px;
            background: white;
            border-radius: 4px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .month-year {
            position: absolute;
            bottom:62px;
            right: -27px;
            font-size: 2rem;
            line-height: 1;
            font-weight: 300;
            color: #94A3B8;
            transform: rotate(90deg);
            -webkit-transform: rotate(90deg);
            -moz-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
        }

        .year {
            margin-left: 4px;
            color: #CBD5E1;
        }

        .days {
            display: flex;
            flex-wrap: wrap;
            flex-grow: 1;
            margin-right: 46px;
        }

        .day-label {
            position: relative;
            flex-basis: calc(14.286% - 2px);
            margin: 1px 1px 12px 1px;
            font-weight: 700;
            font-size: 0.65rem;
            text-transform: uppercase;
            color: #1E293B;
        }

        .day {
            position: relative;
            flex-basis: calc(14.286% - 2px);
            margin: 1px;
            border-radius: 999px;
            cursor: pointer;
            font-weight: 300;
        }

        .day.dull {
            color: #94A3B8;
        }

        .day.today {
            color: #0EA5E9;
            font-weight: 600;
        }

        .day::before {
            content: '';
            display: block;
            padding-top: 100%;
        }

        .day:hover {
            background: #E0F2FE;
        }

        .day .content {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</x-calendar-layout>
