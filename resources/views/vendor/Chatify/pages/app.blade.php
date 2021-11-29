@include('Chatify::layouts.headLinks')
<div class="messenger">
    {{-- ----------------------Users/Groups lists side---------------------- --}}
    <div class="messenger-listView">
        {{-- Header and search bar --}}
        <div class="m-header">
            <nav>
                <a href="#"><i class="fas fa-inbox"></i> <span class="messenger-headTitle">MESSAGES</span> </a>
                {{-- header buttons --}}
                <nav class="m-header-right">
                    <a href="#"><i class="fas fa-cog settings-btn"></i></a>
                    <a href="#" class="listView-x"><i class="fas fa-times"></i></a>
                </nav>
            </nav>
            {{-- Search input --}}
            <input type="text" class="messenger-search" placeholder="Search" />
            {{-- Tabs --}}
            <div class="messenger-listView-tabs">
                <a href="#" class="active-tab" data-view="all">
                    <span class="far fa-user"></span> All_Chat</a>
                <a href="#"  data-view="student">
                    <span class="far fa-user"></span> Student</a>
                <a href="#"  data-view="teacher">
                    <span class="fas fa-users"></span> Teacher</a>
                <a href="#" data-view="groups">
                    <span class="fas fa-users"></span> Groups</a>
            </div>
        </div>
        {{-- tabs and lists --}}
        <div class="m-body">
           {{-- Lists [Users/Group] --}}
           {{-- ---------------- [ Teacher Tab ] ---------------- --}}
           <div class=" messenger-tab app-scroll" data-view="teacher">

               {{-- Favorites --}}
               <div class="favorites-section">
                <p class="messenger-title">Favorites</p>
                <div class="messenger-favorites app-scroll-thin"></div>
               </div>

               {{-- Saved Messages --}}
               <!-- {!! view('Chatify::layouts.listItem', ['get' => 'saved','id' => $id])->render() !!} -->

               {{-- Contact --}}
               <div class="listOfContacts_teacher" style="width: 100%;height: calc(100% - 200px);position: relative;"></div>

           </div>

           {{-- ---------------- [ Student Tab ] ---------------- --}}
           <div class="messenger-tab app-scroll" data-view="student">

               {{-- Favorites --}}
               <div class="favorites-section">
                <p class="messenger-title">Favorites</p>
                <div class="messenger-favorites app-scroll-thin"></div>
               </div>

               {{-- Saved Messages --}}
               <!-- {!! view('Chatify::layouts.listItem', ['get' => 'saved','id' => $id])->render() !!} -->

               {{-- Contact --}}
               <div class="listOfContacts_student" style="width: 100%;height: calc(100% - 200px);position: relative;"></div>

           </div>

           {{-- ---------------- [ All Tab ] ---------------- --}}
           <div class="show messenger-tab app-scroll" data-view="all">

               {{-- Favorites --}}
               <div class="favorites-section">
                <p class="messenger-title">Favorites</p>
                <div class="messenger-favorites app-scroll-thin"></div>
               </div>

               {{-- Saved Messages --}}
               <!-- {!! view('Chatify::layouts.listItem', ['get' => 'saved','id' => $id])->render() !!} -->

               {{-- Contact --}}
               <div class="listOfContacts" style="width: 100%;height: calc(100% - 200px);position: relative;"></div>

           </div>


           {{-- ---------------- [ Group Tab ] ---------------- --}}
           <div class="@if($route == 'group') show @endif messenger-tab app-scroll" data-view="groups">
                {{-- items --}}
                @if(is_student() || is_teacher())
                    @php
                        $group = App\Models\MessengerGroup::get();
                        foreach($group as  $group){
                             $member = $group->member ? json_decode($group->member) : [];
                             if(in_array(Auth::id(),$member)){
                                echo <<<EOT
                                <table id="5" class="messenger-list-item" data-contact="$group->id">
                                    <tr data-action="0">
                                        <td>
                                        <p data-id="group_$group->id">
                                             $group->name
                                            </p>
                                        <span>
                                        </span>
                                        </td>
                                    </tr>
                                </table> 
                                EOT;
                             }
                        }
                    @endphp

                    @if(is_teacher())
                        @php
                          $class = json_decode(Auth::user()->expertIn);
                        @endphp
                        @foreach ($class as $class)
                        <table id="5" class="messenger-list-item @if(auth()->user()->id == $id && $id != "0") m-list-active @endif" data-contact="{{ auth()->user()->course }}">
                        <tr data-action="0">
                      
                            {{-- center side --}}
                            <td>
                            <p data-id="{{  'groups'.'_'.$class }}">
                                {{ getClass($class) }} 
                                <!--  -->
                                </p>
                            <span>
                        
                            
                            </span>
                            {{-- New messages counter --}}
                                
                            </td>
                            
                        </tr>
                        </table>
                        @endforeach
                    @else
                    <table id="5" class="messenger-list-item @if(auth()->user()->id == $id && $id != "0") m-list-active @endif" data-contact="{{ auth()->user()->course }}">
                    <tr data-action="0">
                      
                        {{-- center side --}}
                        <td>
                        <p data-id="{{  'groups'.'_'.auth()->user()->course }}">
                            {{ getClass(Auth::user()->course) }} 
                            <!--  -->
                           </p>
                        <span>
                     
                      
                        </span>
                        {{-- New messages counter --}}
                           
                        </td>
                        
                    </tr>
                    </table>
                    @endif
                
                @endif
             </div>

             {{-- ---------------- [ Search Tab ] ---------------- --}}
           <div class="messenger-tab app-scroll" data-view="search">
                {{-- items --}}
                <p class="messenger-title">Search</p>
                <div class="search-records">
                    <p class="message-hint center-el"><span>Type to search..</span></p>
                </div>
             </div>
        </div>
    </div>

    {{-- ----------------------Messaging side---------------------- --}}
    <div class="messenger-messagingView">
        {{-- header title [conversation name] amd buttons --}}
        <div class="m-header m-header-messaging">
            <nav>
                {{-- header back button, avatar and user name --}}
                <div style="display: inline-flex;">
                    <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                    <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                    </div>
                    <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                </div>
                {{-- header buttons --}}
                <nav class="m-header-right">
                    <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                    <a href="/"><i class="fas fa-home"></i></a>
                    <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                </nav>
            </nav>
        </div>
        {{-- Internet connection --}}
        <div class="internet-connection">
            <span class="ic-connected">Connected</span>
            <span class="ic-connecting">Connecting...</span>
            <span class="ic-noInternet">No internet access</span>
        </div>
        {{-- Messaging area --}}
        <div class="m-body app-scroll">
            <div class="messages">
                <p class="message-hint center-el"><span>Please select a chat to start messaging</span></p>
            </div>
            {{-- Typing indicator --}}
            <div class="typing-indicator">
                <div class="message-card typing">
                    <p>
                        <span class="typing-dots">
                            <span class="dot dot-1"></span>
                            <span class="dot dot-2"></span>
                            <span class="dot dot-3"></span>
                        </span>
                    </p>
                </div>
            </div>
            {{-- Send Message Form --}}
            @include('Chatify::layouts.sendForm')
        </div>
    </div>
    {{-- ---------------------- Info side ---------------------- --}}
    <div class="messenger-infoView app-scroll" style="display: none">
        {{-- nav actions --}}
        <nav>
            <a href="#"><i class="fas fa-times"></i></a>
        </nav>
        {!! view('Chatify::layouts.info')->render() !!}
    </div>
</div>

@include('Chatify::layouts.modals')
@include('Chatify::layouts.footerLinks')
