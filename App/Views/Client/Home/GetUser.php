<div class="modal fade" id="res-info-modal" tabindex="-1">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php
    print_r($data["user"]);
?>
<div class="app">
        <div class="header">
            <div class="header__title"><span data-text="<?=$data["user"]["user_name"]?>"><?=$data["user"]["user_name"]?></span></div>
            <div class="header__nav">
                <div class="header__nav-item header__nav-item--active" data-order="0">
                    <span>
                        <i class="fas fa-home"></i>
                    </span>
                </div>
                <div class="header__nav-item" data-order="1">
                    <span>
                        <i class="fas fa-address-card"></i>
                    </span>
                </div>
                <div class="header__nav-item" data-order="2">
                    <span>
                        <i class="fas fa-pencil-ruler"></i>
                    </span>
                </div>
                <div class="header__nav-item" data-order="3">
                    <span>
                        <i class="fas fa-tasks"></i>
                    </span>
                </div>
                <!-- <div class="header-nav-item--no-active" data-order="4">
                    <span>
                        <i class="fas fa-hourglass-start"></i>
                    </span>
                </div> -->
                <div class="header__nav-item" data-order="4">
                    <span>
                        <i class="fas fa-phone"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="left-part">
                <div class="left-part__container">
                    <div class="left-part__avatar"></div>
                    <div class="left-part__information">
                        <h3 class="left-part__my-name">
                            <?=$data["user"]["user_name"]?>
                        </h3>
                        <span class="left-part__description">
                        <?=$data["user"]["title"]?>
                        </span>
                    </div>
                    <div class="left-part__navigation">
                        <ul class="left-part__menu">
                            <li class="left-part__item left-part__item--active left-part__item--effect" data-order="0"><span>Home</span></li>
                            <li class="left-part__item left-part__item--effect" data-order="1"><span>About</span></li>
                            <li class="left-part__item left-part__item--effect" data-order="2"><span>Skills</span></li>
                            <li class="left-part__item left-part__item--effect" data-order="3"><span>Projects</span></li>
                            <!-- <li class="left-part__item left-part__item--effect" data-order="4"><span>Experience</span></li> -->
                            <li class="left-part__item left-part__item--effect" data-order="4"><span>Contact</span></li>
                        </ul>
                    </div>
                    <div class="left-part__footer">
                        © 2022 Designed by <a href="https://www.facebook.com/thuan.trong.564">Nguyen Trong Thuan</a>
                    </div>
                </div>
            </div>
            <div class="right-part">
                <div class="right-part__page home">
                    <div class="home__background"></div>
                    <div class="home__info">
                        <div class="home__descriptions">
                            <div class="home__avatar"></div>
                            <h2 class="home__title"><?=$data["user"]["user_name"]?></h2>
                            <span><?=$data["user"]["slogan"]?></span>
                            <div class="home__downloadCV" data-bs-toggle="modal" data-bs-target="#res-info-modal">DOWNLOAD CV
                                <i class="fas fa-download"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-part__page about">
                    <h3 class="about__title">ABOUT ME</h3>
                    <h2 class="about__question">WHO AM I?</h2>
                    <span class="about__description">
                        <?=$data["user"]["desc"]?>
                        <span class="about__description--contact-forward">Contact</span> section.
                    </span>
                        
                    <ul class="about__socials socials">
                        <li class="about__social social"><a href="https://www.facebook.com/thuan.trong.564"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="about__social social"><a href="https://www.youtube.com/channel/UC9yqY32OWweRCVtyx-opv5w"><i class="fab fa-youtube"></i></a></li>
                        <li class="about__social social"><a href="https://twitter.com/ThuanTrong612"><i class="fab fa-twitter"></i></a></li>
                        <li class="about__social social"><a href="https://github.com/ntthuan060102github"><i class="fab fa-github"></i></a></li>
                        <li class="about__social social"><a href="https://www.instagram.com/ntt06012k2/"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                    <div class="about__fields">
                        <div class="grid wide">
                            <div class="row">
                                <?php
                                    foreach($data["user"]["skills"] as $item){

                                    }
                                ?>
                                <div class="col l-4 c-12 m-4">
                                    <div class="about__fe about__field">
                                        <i class="far fa-window-restore"></i>
                                        <span class="about__field-title">Web Design</span>
                                    </div>
                                </div>
                                <div class="col l-4 c-12 m-4">
                                    <div class="about__game about__field">
                                        <i class="fas fa-gamepad"></i>
                                        <span class="about__field-title">Game</span>
                                    </div>
                                </div>
                                <div class="col l-4 c-12 m-4">
                                    <div class="about__design about__field">
                                        <i class="fas fa-drafting-compass"></i>
                                        <span class="about__field-title">Graphic Design</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
                <div class="right-part__page skills">
                    <div class="skills-wrap">
                        <div class="skills__title">MY SKILLS</div>
                        <div class="gird wide">
                            <div class="row">
                                <div class="col l-6 c-12 m-12">
                                    <div class="skills__progess-wrap">
                                        <span class="skills__progess-title">HTML5</span>
                                        <span class="skills__progress-rate"></span>
                                        <div class="skills__progess">
                                            <div class="skills__progess-bar skills__HTML5"></div>
                                        </div>
                                    </div>
                                    <div class="skills__progess-wrap">
                                        <span class="skills__progess-title">CSS3</span>
                                        <span class="skills__progress-rate"></span>
                                        <div class="skills__progess">
                                            <div class="skills__progess-bar skills__CSS3"></div>
                                        </div>
                                    </div>
                                    <div class="skills__progess-wrap">
                                        <span class="skills__progess-title">PhotoShop</span>
                                        <span class="skills__progress-rate"></span>
                                        <div class="skills__progess">
                                            <div class="skills__progess-bar skills__PS"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col l-6 c-12 m-12">
                                    <div class="skills__progess-wrap">
                                        <span class="skills__progess-title">Python</span>
                                        <span class="skills__progress-rate"></span>
                                        <div class="skills__progess">
                                            <div class="skills__progess-bar skills__PY"></div>
                                        </div>
                                    </div>
                                    <div class="skills__progess-wrap">
                                        <span class="skills__progess-title">C++</span>
                                        <span class="skills__progress-rate"></span>
                                        <div class="skills__progess">
                                            <div class="skills__progess-bar skills__CPP"></div>
                                        </div>
                                    </div>
                                    <div class="skills__progess-wrap">
                                        <span class="skills__progess-title">jQuery</span>
                                        <span class="skills__progress-rate"></span>
                                        <div class="skills__progess">
                                            <div class="skills__progess-bar skills__jQuery"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="gird wide">
                        <div class="row">
                            <div class="col l-3 m-6 c-12">
                                <div class="slide__content">
                                    <span class="slide__title">112</span>
                                    <span class="slide__description">CUPS OF COFFEE</span>
                                </div>
                            </div>
                            <div class="col l-3 m-6 c-12">
                                <div class="slide__content">
                                    <span class="slide__title">8</span>
                                    <span class="slide__description">PROJECTS</span>
                                </div>
                            </div>
                            <div class="col l-3 m-6 c-12">
                                <div class="slide__content">
                                    <span class="slide__title">5</span>
                                    <span class="slide__description">PROGRAMING LANGUAGES</span>
                                </div>
                            </div>
                            <div class="col l-3 m-6 c-12">
                                <div class="slide__content">
                                    <span class="slide__title">1</span>
                                    <span class="slide__description">CERTIFICATES</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-part__page projects">
                    <div class="projects__title">PROJECTS</div>
                    <div class="grid wide">
                        <div class="row">
                            <div class="col l-6 c-12 m-12"> 
                                <span class="projects__project-name">Unity Engine, C#: Cube Jump</span>
                                <iframe class="projects__project" src="https://www.youtube.com/embed/N0BUvvX7Gus" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <a href="https://github.com/ntthuan060102github/Game-Cube-Jump" class="projects__view-source">View details</a>
                            </div>
                            <div class="col l-6 c-12 m-12">            
                                <span class="projects__project-name">Socket Programming: V-GOLD Application</span>
                                <iframe class="projects__project" src="https://www.youtube.com/embed/nBwMibs6c9Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <a href="https://github.com/ntthuan060102github/V-Gold---Socket-Programing" class="projects__view-source">View details</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col l-6 c-12 m-12">
                                <span class="projects__project-name">Web Design: SetSail</span>
                                <div class="projects__project" style="background-image: url('./assets/images/setsail.png')"></div>
                                <a href="https://ntthuan060102github.github.io/Setsail---Clone/" class="projects__view-source">View details</a>
                            </div>
                            <div class="col l-6 c-12 m-12">
                                <span class="projects__project-name">Python: Game Racing Arcade</span>
                                <iframe class="projects__project" src="https://www.youtube.com/embed/NvjnVBy6bok" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <a href="https://drive.google.com/drive/folders/1Ohjx_M_dGgUrbH0hgDUIn_HVWs8K6K64?usp=sharing" class="projects__view-source">View details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="right-part__page experience">
                    In the future I have some big projects related to front-end and games. 
                    And all those projects will be published on this website. Follow them.
                </div> -->
                <div class="right-part__page contact">
                    <div class="contact-wrap">
                        <div class="gird wide">
                            <div class="row">
                                <div class="col l-5 c-12 m-12">
                                    <div class="contact__title">CONTACT</div>
                                    <div class="contact__infos">
                                        <div class="contact__info">
                                            Street 3, Phu Tuc, Krong Pa, Gia Lai, VietNam
                                        </div>
                                        <div class="contact__info">
                                            Email: <a href="mailto:ntt06012k2@gmail.com">ntt06012k2@gmail.com</a>
                                        </div>
                                        <div class="contact__info">
                                            Phone: <a href="tel:0962439675">0962439675</a>
                                        </div>
                                    </div>
                                    <ul class="contact__socials socials">
                                        <li class="contact__social social"><a href="https://www.facebook.com/thuan.trong.564"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="contact__social social"><a href="https://www.youtube.com/channel/UC9yqY32OWweRCVtyx-opv5w"><i class="fab fa-youtube"></i></a></li>
                                        <li class="contact__social social"><a href="https://twitter.com/ThuanTrong612"><i class="fab fa-twitter"></i></a></li>
                                        <li class="contact__social social"><a href="https://github.com/ntthuan060102github"><i class="fab fa-github"></i></a></li>
                                        <li class="contact__social social"><a href="https://www.instagram.com/ntt06012k2/"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                                <div class="col l-7 c-12 m-12">
                                    <div class="contact__forms">
                                        <div class="contact__form">
                                            <input name="First name" type="text" class="contact__form-input" placeholder=" ">
                                            <label for="First name" class="contact__label">First name</label>
                                        </div>
                                        <div class="contact__form">
                                            <input name="Last name" type="text" class="contact__form-input" placeholder=" ">
                                            <label for="Last name" class="contact__label">Last name</label>
                                        </div>
                                        <div class="contact__form">
                                            <input name="Email" type="text" class="contact__form-input" placeholder=" ">
                                            <label for="Email" class="contact__label">Email</label>
                                        </div>
                                        <div class="contact__form">
                                            <textarea name="Message" cols="30" rows="8" class="contact__form-input" placeholder=" "></textarea>
                                            <!-- <textarea type="text" class="contact__form-input" placeholder=" " rows="5" multiline cols="20">
                                            </textarea> -->
                                            <label for="Message" class="contact__label">Message</label>
                                        </div>
                                        <div class="contact__submit-btn">
                                            Submit
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>