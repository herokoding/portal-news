<div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">
        <div class="single-sidebar-widget newsletter-widget">
            <h4 class="single-sidebar-widget__title">Newsletter</h4>
            <div class="form-group mt-30">
                <div class="col-autos">
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                </div>
            </div>
            <button class="bbtns d-block mt-20 w-100">Subcribe</button>
        </div>


        <div class="single-sidebar-widget post-category-widget">
            <h4 class="single-sidebar-widget__title">Category</h4>
            <ul class="cat-list mt-20">
                @foreach ($categories as $item)
                    <li>
                        <a href="/category/{{ $item->slug }}" class="d-flex justify-content-between">
                            <p>{{ $item->name }}</p>
                            <p>({{ $item->post_count }})</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="single-sidebar-widget popular-post-widget">
            <h4 class="single-sidebar-widget__title">Recent Posts</h4>
            <div class="popular-post-list">
                @foreach ($recent_post as $item)
                    <div class="single-post-list">
                        <div class="thumb">
                            <div class="details mt-20">
                                <a href="/post/{{ $item->slug }}">
                                    <h6>{{ $item->title }}</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
