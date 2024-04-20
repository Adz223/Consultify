import React from "react";
// Import Swiper React components
import { Swiper, SwiperSlide } from "swiper/react";

// Import Swiper styles
import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/navigation";


// import required modules
import { Autoplay,Parallax, Pagination, Navigation } from "swiper/modules";
import { Link } from "react-router-dom";

const Intro = () => {
  return (
    <>
      <Swiper
        style={{
          "--swiper-navigation-color": "#fff",
          "--swiper-pagination-color": "#fff",
        }}
        speed={600}
        parallax={true}
        autoplay={{
          delay: 2500,
          disableOnInteraction: false,
        }}
        pagination={{
          clickable: true,
        }}
        navigation={true}
        modules={[Autoplay,Parallax, Pagination, Navigation]}
        className="mySwiper"
      >
        <SwiperSlide>
          {/* Start intro area */}
          <section className="intro-area intro-home-2 intro-area-3">
            <div className="hero-slider">
              <div className="slider-active">
                <div
                  className="single-slide slider-height d-flex align-items-center"
                  style={{
                    backgroundImage: "url(/assets/img/background/bg3.jpg)",
                  }}
                >
                  <div className="container">
                    <div className="row">
                      <div className="col-xl-8 col-lg-8 col-md-10">
                        <div className="slide-all-text">
                          {/* layer 1 */}
                          <div
                            // className="layer-1"
                            // data-animation="fadeInUp"
                            // data-delay=".4s"
                          >
                            <h4 className="title-1">
                              Best business consultant platform
                            </h4>
                          </div>
                          {/* layer 2 */}
                          <div
                            // className="layer-2"
                            // data-animation="fadeInUp"
                            // data-delay=".6s"
                          >
                            <h2 className="title-2">
                              Welcome to Consultify Our Consulting Platform
                            </h2>
                          </div>
                          {/* layer 3 */}
                          <div
                            className="layer-3"
                            data-animation="fadeInUp"
                            data-delay=".8s"
                          >
                            <Link
                              to="/service"
                              className="ready-btn anti-btn"
                            >
                              Get started
                            </Link>
                            <div className="video-content">
                              <Link
                                to="#"
                                className="video-play vid-zone"
                              >
                                <i className="fa fa-play" />
                                <span>watch video</span>
                              </Link>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          {/* End intro area */}
        </SwiperSlide>
        <SwiperSlide>
          {/* Start intro area */}
          <section className="intro-area intro-home-2 intro-area-3">
            <div className="hero-slider">
              <div className="slider-active">
                <div
                  className="single-slide slider-height d-flex align-items-center"
                  style={{
                    backgroundImage: "url(/assets/img/background/bg4.jpg)",
                  }}
                >
                  <div className="container">
                    <div className="row">
                      <div className="col-xl-8 col-lg-8 col-md-10">
                        <div className="slide-all-text">
                          {/* layer 1 */}
                          <div
                            // className="layer-1"
                            // data-animation="fadeInUp"
                            // data-delay=".4s"
                          >
                            <h4 className="title-1">
                              Best business consultant platform
                            </h4>
                          </div>
                          {/* layer 2 */}
                          <div
                            // className="layer-2"
                            // data-animation="fadeInUp"
                            // data-delay=".6s"
                          >
                            <h2 className="title-2">
                            Welcome to Consultify Our Consulting Platform
                            </h2>
                          </div>
                          {/* layer 3 */}
                          <div
                            className="layer-3"
                            data-animation="fadeInUp"
                            data-delay=".8s"
                          >
                            <Link
                              to="/service"
                              className="ready-btn anti-btn"
                            >
                              Get started
                            </Link>
                            <div className="video-content">
                              <Link
                                to="https://www.youtube.com/watch?v=O33uuBh6nXA"
                                className="video-play vid-zone"
                              >
                                <i className="fa fa-play" />
                                <span>watch video</span>
                              </Link>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          {/* End intro area */}
        </SwiperSlide>
      </Swiper>
    </>
  );
};

export default Intro;
