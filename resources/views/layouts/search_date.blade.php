<div class="pull-right">
    <!-- search form -->
    <form action="{{$route}}" method="get" id="admin-search">
        <input type="date" name="from" class="form-control" placeholder="From" value="{!! request()->input('from') !!}">
        <input type="date" name="to" class="form-control" placeholder="To" value="{!! request()->input('to') !!}">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search..." value="{!! request()->input('q') !!}">
            <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i> Search </button>
            </span>
        </div>
    </form>
    <!-- /.search form -->
</div>