<div class="container">
        <div class="row">

            @forelse($list as $singleCompany)
            <div class="col-sm-4">
                <div class="company_detail">
                    <div class="card card-body">
                        <div class="review_image">
                            <img alt="{{$singleCompany->title}}" src="{{backend_asset('company_images/'.$singleCompany->logo)}}" width="20%" class="card-img-top">
                        </div>
                        <div class="review_detail">
                            <h5 class="card-title">{{$singleCompany->title}}</h5><a href="{{route('podjetja').'/'.$singleCompany->slug}}"><button class="btn btn-warning">Preberi več </button></a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="alert alert-danger">
                <p>No Data found! Please search by other keyword</p>

            </div>

            @endforelse

            <!-- {{ $list->withQueryString()->onEachSide(1)->links() }} -->

            @if ($list->hasPages())
            <ul class="pagination pagination">
                {{-- Previous Page Link --}}
                @if ($list->onFirstPage())
                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                @else
                <li class="page-item"><a class="page-link" href="{{ $list->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                @endif

                @foreach(range(1, $list->lastPage()) as $i)
                @if($i >= $list->currentPage() - 4 && $i <= $list->currentPage() + 4)
                    @if ($i == $list->currentPage())
                    <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                    @else
                    <li class="page-item"><a class="page-link" href="{{ $list->url($i) }}">{{ $i }}</a></li>
                    @endif
                    @endif
                    @endforeach



                    {{-- Next Page Link --}}
                    @if ($list->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $list->nextPageUrl() }}" rel="next">&raquo;</a></li>
                    @else
                    <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                    @endif
            </ul>
            @endif

        </div>
    </div>