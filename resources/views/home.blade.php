@extends('layouts.app')

@section('content')


<div class="header_section">
    <div class="container">

        {{-- Nav Bar Include --}}
        @include('includes.nav_bar')
        {{-- Nav Bar Include --}}

        <div class="into_bar">
            <span class="first_bg_style">Hi</span>
            <span class="display_name">I'm MOENUL ISLAM</span>

            <span class="second_bg_style">;</span>

            <span class="animate_title">Full-Stack</span>
            <div class="animate_section">
                <span>WEB <span class="animate_text auto-type"></span></span>
            </div>

            <div class="display_image_section">
                <div class="bg_image">
                    <img src="{{ asset('images/Website_Main_Bg_photo.png') }}">
                </div>
            </div>
        </div>

    </div>
</div>

<div class="service_section">
    <div class="container">
        <div class="service_bar">
            <div class="logo_section">
                <div class="logo_bar">
                    <span class="iconify" data-icon="ph:note-pencil-light"></span>
                </div>
            </div>
            <div class="name_section">Designer</div>
            <div class="desc_section"><p>I value simple content structure, clean design patterns, and thoughtful interactions.</p></div>
            <div class="cool_title">Things I enjoy designing</div>
            <div class="cool_desc">UI UX | Web | App </div>
            <div class="skill_title">Design Tools</div>
            <div class="skill_desc">
                Pen & Paper <br>
                Sketch <br>
                Figma <br>
                Illustrator <br>
                Photoshop <br>
            </div>
        </div>

        <div class="service_bar">
            <div class="logo_section">
                <div class="logo_bar">
                    <span class="iconify" data-icon="ant-design:code-outlined"></span>
                </div>
            </div>
            <div class="name_section">Frontend Developer</div>
            <div class="desc_section"><p>I like to code things from scratch, and enjoy bringing ideas to life in the browser.</p></div>
            <div class="cool_title">Things I maintain</div>
            <div class="cool_desc">Responsive | Cool | User Friendly</div>
            <div class="skill_title">Dev Tools</div>
            <div class="skill_desc">
                HTML 5 <br>
                CSS 3 <br>
                JavaScript <br>
                Bootstrap <br>
                WordPress <br>
                Git <br>
            </div>
        </div>

        <div class="service_bar">
            <div class="logo_section">
                <div class="logo_bar">
                    <span class="iconify" data-icon="solar:sidebar-code-bold"></span>
                </div>
            </div>
            <div class="name_section">Backend Developer</div>
            <div class="desc_section"><p>I value simple content structure, clean design patterns, and thoughtful interactions.</p></div>
            <div class="cool_title">Things I do</div>
            <div class="cool_desc">E-Commerce | Startup | Social </div>
            <div class="skill_title">Dev Languages</div>
            <div class="skill_desc">
                PHP <br>
                Laravel <br>
                Ajax <br>
                SQL <br>
                API Implementing <br>
            </div>
        </div>
    </div>
</div>

<div class="gallary_section" id="gallary">
    <div class="container">
        <div class="main_title">My Recent Work</div>
        <div class="sub_title">Here are a few post of projects I've worked on.</div>

        <div class="gallary">
            <div class="gallary_item">
                <img src="/FrontEnd/Portfolio/images/dribbble-33.png">
                <div class="gallary_item_hover">
                    <div class="item_desc">Vancouver's tower crane rental service and support leader since 1974.</div>
                    <a href=""><div class="item_button">Visit Website</div></a>
                </div>
            </div>

            <div class="gallary_item">
                <img src="/FrontEnd/Portfolio/images/dribbble-34.png">
                <div class="gallary_item_hover">
                    <div class="item_desc">Vancouver's tower crane rental service and support leader since 1974.</div>
                    <a href=""><div class="item_button">Visit Website</div></a>
                </div>
            </div>

            <div class="gallary_item">
                <img src="/FrontEnd/Portfolio/images/website4.png">
                <div class="gallary_item_hover">
                    <div class="item_desc">Vancouver's tower crane rental service and support leader since 1974.</div>
                    <a href=""><div class="item_button">Visit Website</div></a>
                </div>
            </div>

            <div class="gallary_item">
                <img src="/FrontEnd/Portfolio/images/1-Root-Studio-e1520589902386.jpg">
                <div class="gallary_item_hover">
                    <div class="item_desc">Vancouver's tower crane rental service and support leader since 1974.</div>
                    <a href=""><div class="item_button">Visit Website</div></a>
                </div>
            </div>

            <div class="gallary_item">
                <img src="/FrontEnd/Portfolio/images/website1.png">
                <div class="gallary_item_hover">
                    <div class="item_desc">Vancouver's tower crane rental service and support leader since 1974.</div>
                    <a href=""><div class="item_button">Visit Website</div></a>
                </div>
            </div>

            <div class="gallary_item">
                <img src="/FrontEnd/Portfolio/images/541255pothseba_domain_theme.png">
                <div class="gallary_item_hover">
                    <div class="item_desc">Vancouver's tower crane rental service and support leader since 1974.</div>
                    <a href=""><div class="item_button">Visit Website</div></a>
                </div>
            </div>

        </div>

    </div>
</div>



<div class="artical_section">
    <div class="container">
        <div class="style_bar">
            <div class="style_box">
                <div class="span span_1">I Write,</div>
                <div class="span span_2">Sometimes</div>
                <div class="design">
                    <img src="{{ asset('images/star.png') }}">
                </div>
            </div>
        </div>
        <div class="button_bar">
            <div class="button_title"><p>
                I write about my feelings, thought, social issues, design, frontend dev, learning and life.
            </p></div>
            <a href=""><div class="button">Read my Articles <span class="iconify" data-icon="cil:arrow-right"></span></div></a>
        </div>
    </div>
</div>



<div class="contact_section" id="contact">
    <div class="container">
        <div class="main_title">Say hello?</div>
        <div class="sub_title">You can touch on me by a email or those social sites</div>

        <div class="contact_bar">
            <div class="mail_section">
                <form>
                    <div class="form-group">
                        <textarea class="form-control" rows="4" placeholder="Write Here ..."></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Your Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="example@mail.com">
                    </div>
                    <button type="submit" class="btn">Send</button>
                </form>
            </div>
            <div class="social_section">
                <div class="social_bar">
                    <a href=""><div class="social_iteml" style="color:#0553A0;">
                        <span class="iconify" data-icon="entypo-social:linkedin-with-circle"></span>
                    </div></a>
                    <a href=""><div class="social_iteml" style="color:#000000;">
                        <span class="iconify" data-icon="cib:github"></span>
                    </div></a>
                    <a href=""><div class="social_iteml" style="color:#177CE1;">
                        <span class="iconify" data-icon="bi:facebook"></span>
                    </div></a>
                    <a href=""><div class="social_iteml" style="color:#EA2727;">
                        <span class="iconify" data-icon="entypo-social:youtube-with-circle"></span>
                    </div></a>
                    <a href=""><div class="social_iteml" style="color:#449FFA;">
                        <span class="iconify" data-icon="formkit:twitter"></span>
                    </div></a>
                    <a href=""><div class="social_iteml" style="color:#3a97f5;">
                        <span class="iconify" data-icon="entypo-social:skype-with-circle"></span>
                    </div></a>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection
