    <!-- Footer -->
    <footer>
        <div class="footer">
            <div class="contents">
                <div class="container">
                    <div class="row g-5">
                            <?php 
                            $html = App\Models\Option::where('type','footer')->get();
                            $foot = [];
                            if(count($html)>0){
                                foreach($html as $row){
                                    array_push($foot,$row->content);
                                }
                            }
                            ?>
                            {!! isset($foot[0]) ? $foot[0] : '' !!}
                            {!! isset($foot[1]) ? $foot[1] : '' !!}
                            {!! isset($foot[2]) ? $foot[2] : '' !!}
                            {!! isset($foot[3]) ? $foot[3] : '' !!}
                    </div>
                </div>
            </div>
            {!! isset($foot[4]) ? $foot[4] : '' !!}
        </div>
    </footer>
    <!-- /Footer -->