<style>
    .read-more {
        white-space: normal !important;
        max-width: 300px !important;
        word-wrap: break-word !important;
    }
</style>
<div class="table-responsive">
    <table>
        <thead>
        <tr>
            <th>Rating</th>
            <th>Item</th>
            <th>Left by</th>
            <th>Comments</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($feedbacks as $feedback)
        <tr>
            <td>
                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.04688 6.5625H0.703125C0.314795 6.5625 0 6.8773 0 7.26562V14.2969C0 14.6852 0.314795 15 0.703125 15H3.04688C3.43521 15 3.75 14.6852 3.75 14.2969V7.26562C3.75 6.8773 3.43521 6.5625 3.04688 6.5625ZM1.875 13.8281C1.48667 13.8281 1.17188 13.5133 1.17188 13.125C1.17188 12.7367 1.48667 12.4219 1.875 12.4219C2.26333 12.4219 2.57813 12.7367 2.57813 13.125C2.57813 13.5133 2.26333 13.8281 1.875 13.8281ZM11.25 2.38629C11.25 3.62895 10.4892 4.32598 10.2751 5.15625H13.2553C14.2337 5.15625 14.9954 5.96912 15 6.85834C15.0024 7.38387 14.7789 7.94962 14.4305 8.29966L14.4273 8.30288C14.7154 8.98658 14.6686 9.94459 14.1546 10.6311C14.4089 11.3897 14.1525 12.3216 13.6746 12.8212C13.8005 13.3368 13.7404 13.7756 13.4945 14.1288C12.8966 14.9879 11.4145 15 10.1613 15L10.078 15C8.6633 14.9995 7.50551 14.4844 6.57522 14.0705C6.10773 13.8625 5.49648 13.6051 5.03271 13.5966C4.84111 13.593 4.6875 13.4367 4.6875 13.2451V6.98227C4.6875 6.88852 4.72506 6.79854 4.79174 6.73263C5.95231 5.58583 6.45135 4.37168 7.40259 3.41883C7.8363 2.9843 7.99404 2.32793 8.14653 1.69318C8.27681 1.15116 8.54933 0 9.14063 0C9.84376 0 11.25 0.234375 11.25 2.38629Z" fill="#52D017" />
                </svg>
            </td>

            <td>{{$feedback->quote_by_transporter->quote->vehicle_make}} {{$feedback->quote_by_transporter->quote->vehicle_model}}</td>
            <td>
                @if($feedback->quote_by_transporter->quote->user)
                    @if($feedback->quote_by_transporter->quote->user->name)
                        {{$feedback->quote_by_transporter->quote->user->name}}
                    @else
                        {{$feedback->quote_by_transporter->quote->user->username}}
                    @endif
                @else
                    -
                @endif
            <td class="read-more">{!! $feedback->comment ? readMoreHelper($feedback->comment, 50) : '-' !!}</td>
            <td>{{general_date($feedback->created_at)}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
{{--{{ $feedbacks->links() }}--}}
{{--<nav aria-label="...">--}}
{{--    <ul class="pagination">--}}
{{--        <li class="page-item page-prenxt disabled">--}}
{{--            <a class="page-link" href="javascript:;" tabindex="-1">--}}
{{--                <svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                    <path d="M5.5 1L1 5.5L5.5 10" stroke="black" stroke-linecap="round" />--}}
{{--                </svg>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="page-item">--}}
{{--            <a class="page-link" href="javascript:;">1</a>--}}
{{--        </li>--}}
{{--        <li class="page-item active">--}}
{{--            <a class="page-link" href="javascript:;">2</a>--}}
{{--        </li>--}}
{{--        <li class="page-item">--}}
{{--            <a class="page-link" href="javascript:;">3</a>--}}
{{--        </li>--}}
{{--        <li class="page-item">--}}
{{--            <a class="page-link" href="javascript:;">4</a>--}}
{{--        </li>--}}
{{--        <li class="page-item page-prenxt">--}}
{{--            <a class="page-link" href="javascript:;">--}}
{{--                <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                    <path d="M1 1L5.5 5.5L1 10" stroke="black" stroke-linecap="round" />--}}
{{--                </svg>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</nav>--}}

@if ($feedbacks->lastPage() > 1)
    <nav aria-label="...">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            <li class="page-item{{ ($feedbacks->currentPage() == 1) ? ' disabled' : '' }}">
                <a class="page-link" href="{{ $feedbacks->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                    <svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.5 1L1 5.5L5.5 10" stroke="black" stroke-linecap="round" />
                    </svg>
                </a>
            </li>

            {{-- Pagination Elements --}}
            @for ($i = 1; $i <= $feedbacks->lastPage(); $i++)
                @if ($i == $feedbacks->currentPage())
                    <li class="page-item active" aria-current="page"><span class="page-link">{{ $i }}</span></li>
                @elseif ($i >= $feedbacks->currentPage() - 2 && $i <= $feedbacks->currentPage() + 2)
                    <li class="page-item"><a class="page-link" href="{{ $feedbacks->url($i) }}">{{ $i }}</a></li>
                @elseif (($i == $feedbacks->currentPage() - 3 && $i > 1) || ($i == $feedbacks->currentPage() + 3 && $i < $feedbacks->lastPage()))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                @endif
            @endfor

            {{-- Next Page Link --}}
            <li class="page-item{{ ($feedbacks->currentPage() == $feedbacks->lastPage()) ? ' disabled' : '' }}">
                <a class="page-link" href="{{ $feedbacks->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                    <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L5.5 5.5L1 10" stroke="black" stroke-linecap="round" />
                    </svg>
                </a>
            </li>
        </ul>
    </nav>
@endif


