import axios from "axios";
import React, { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import Swal from "sweetalert2";
import BaseUrl from "../../Auth/BaseUrl";
import UserLoader from "../../Component/Loader/Loader";

const Service = () => {
  const [data, setData] = useState([]);
  const [isLoading, setIsLoading] = useState(false);
  const token = localStorage.getItem("token");
  const Getservices = () => {
    setIsLoading(true);
    var config = {
      method: "get",
      url: `${BaseUrl.baseurl}services`,

      headers: {
        Accept: "application/json",
        Authorization: `Bearer ${token}`,
      },
    };

    axios(config)
      .then(function (response) {
        console.log(response, "Getting services");
        setData(response?.data?.services);
        if (response?.data?.status === true) {
          setIsLoading(false);
          Swal.fire({
            showCloseButton: true,
            toast: true,
            icon: "success",
            title: response?.data?.message,
            animation: true,
            position: "top-right",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener("mouseenter", Swal.stopTimer);
              toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
          });
          window.scrollTo({
            top: 0,
            behavior: "smooth",
          });
        } else {
          setIsLoading(false);
        }
      })
      .catch(function (error) {
        setIsLoading(false);
        window.scrollTo({
          top: 0,
          behavior: "smooth",
        });
        Swal.fire({
          showCloseButton: true,
          toast: true,
          icon: "error",
          title: error?.response?.data?.message,
          animation: true,
          position: "top-right",
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
          },
        });
      });
  };
  useEffect(() => {
    Getservices();
    // eslint-disable-next-line
  }, []);

  console.log(data, "Getting services");
  return (
    <>
      {isLoading ? <UserLoader /> : null}
      {/* Start Breadcrumb Area */}
      <section className="page-area area-120 position-relative">
        <div className="container">
          <div className="row">
            <div className="col-xl-12 col-lg-12 col-md-12 justify-content-start align-items-center">
              <div className="breadcrumb-title text-center">
                <div className="white-headline">
                  <h2>
                    Our <span className="sp-color">Services</span>
                  </h2>
                </div>
              </div>
              <div className="breadcrumb-page">
                <nav aria-label="breadcrumb">
                  <ol className="breadcrumb ">
                    <li className="breadcrumb-item">
                      <Link to={"/"}>Home</Link>
                    </li>
                    <li className="breadcrumb-item active" aria-current="page">
                      Services
                    </li>
                    <br />
                    <h4 className="breadcrumb-item active" aria-current="page">
                  Welcome to Consultify — Your Gateway to Revolutionary Business
                  Consulting
                    </h4>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="background-overlay20"></div>
      </section>
      {/* End Breadcrumb Area */}
      {/* Start Welcome area */}
      <div className="welcome-service" id="Contact">
        <div className="container">
          <div className="row d-flex align-items-center">
            <div className="col-xl-5 col-lg-5 col-md-12">
              <div className="left-headline">
                <p className="top-head">What we do?</p>
                <h4>
                  Explore Our Range of Consulting Services:
                </h4>
                <p>
                  At Consultify, we are dedicated to transforming the business
                  consulting landscape by harnessing the power of digital
                  technology to foster faster, more effective communication
                  between businesses and expert consultants. Our innovative
                  platform is designed to streamline the consulting process,
                  eliminating traditional barriers and driving efficiencies.{" "}
                </p>
              </div>
            </div>
            <div className="col-xl-7 col-lg-7 col-md-12 wel-service-inner">
              <div className="row">
                {/* Start feature column  */}
                <div className="col-xl-4 col-lg-4 col-md-4">
                  <div
                    className="wel-text wel-up wow fadeInUp"
                    data-wow-delay="0.2s"
                  >
                    <div className="wel-content">
                      <div className="service-img">
                        <img src="/assets/img/icon/p1.png" alt="" />
                      </div>
                      <Link to={""}>
                        <h4>Our-Services</h4>
                      </Link>
                      <p>
                        Explore our of consulting services tailored for your
                        business needs.{" "}
                      </p>
                      <span className="p-number">01</span>
                    </div>
                  </div>
                </div>
                {/* End feature column  */}
                <div className="col-xl-4 col-lg-4 col-md-4">
                  <div
                    className="wel-text wel-center wow fadeInUp"
                    data-wow-delay="0.3s"
                  >
                    <div className="wel-content">
                      <div className="service-img">
                        <img src="/assets/img/icon/p2.png" alt="" />
                      </div>
                      <Link to={""}>
                        <h4>Meet Our Consultants</h4>
                      </Link>
                      <p>Discover export consultants ready to assist you.</p>
                      <span className="p-number">02</span>
                    </div>
                  </div>
                </div>
                {/* End feature column  */}
                <div className="col-xl-4 col-lg-4 col-md-4">
                  <div
                    className="wel-text wel-up wow fadeInUp"
                    data-wow-delay="0.4s"
                  >
                    <div className="wel-content">
                      <div className="service-img">
                        <img src="/assets/img/icon/p5.png" alt="" />
                      </div>
                      <Link to={""}>
                        <h4>Contact-Us</h4>
                      </Link>
                      <p>Get in touch for more information.</p>
                      <span className="p-number">03</span>
                    </div>
                  </div>
                </div>
                {/* End feature column  */}
              </div>
            </div>
          </div>
        </div>
      </div>
      {/* End Welcome area */}
      {/* Start Feature Area */}
      <div className="feature-area feature-area-2 fix area-padding">
        <div className="container">
          <div className="row d-flex align-items-center">
            <div className="col-xl-6 col-lg-6 col-md-12 mb-5">
              <div className="feature-all">
                <div className="left-headline">
                  <p className="top-head">Features</p>
                  <h2>1. Instant Expert Access</h2>
                  <p>
                    Connect instantly with a wide network of vetted experts
                    across various industries. Whether you need strategic
                    advice, technical expertise, or market insights, Consultify
                    provides direct access to the knowledge you need to thrive.
                    Benefits:
                    <br />
                    Reduced waiting times for expert responses. Access to a
                    diverse pool of seasoned consultants from across the globe.
                    How It Works: Utilize our user-friendly digital interface to
                    post your consulting needs and receive bids from top
                    consultants ready to address your challenges in real-time.
                  </p>
                </div>
              </div>
            </div>
            <div className="col-xl-6 col-lg-6 col-md-12 mb-5">
              <div className="feature-content">
                <div className="feature-images">
                  <img
                    src="/assets/img/feature/b2.jpg"
                    alt=""
                    className="first-img"
                  />
                  <img
                    src="/assets/img/feature/b1.jpg"
                    style={{ objectFit: "cover" }}
                    alt=""
                    className="over-img"
                  />
                </div>
              </div>
            </div>
            <div className="col-xl-6 col-lg-6 col-md-12 ">
              <div className="feature-content">
                <div className="feature-images">
                  <img
                    src="https://media.istockphoto.com/id/1568199725/photo/businessmen-shaking-hands-both-are-dressed-in-business-clothing-and-there-is-paperwork-with.webp?b=1&s=170667a&w=0&k=20&c=5RHqq3AJyJ5k_JFgJMWEU66YaMPxLfCEBAhaRCgxBCw="
                    alt=""
                    className="first-img"
                  />
                  <img
                    src="https://thumbs.dreamstime.com/b/business-consulting-concept-businessman-selecting-interface-54909168.jpg"
                    style={{ objectFit: "cover" }}
                    alt=""
                    className="over-img"
                  />
                </div>
              </div>
            </div>
            <div className="col-xl-6 col-lg-6 col-md-12 ">
              <div className="feature-all">
                <div className="left-headline">
                  <h2>2. Strategic Business Planning</h2>
                  <p>
                    Leverage our strategic planning services to map out a
                    successful path for your business. Our consultants
                    specialize in creating robust, actionable strategies that
                    are customized to your business objectives.
                    <br />
                    Benefits: Tailored strategic guidance to navigate market
                    complexities. Enhanced decision-making processes with expert
                    insights. How It Works: Through interactive webinars and
                    one-on-one digital sessions, our consultants work closely
                    with you to develop and refine your strategic plans.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      {/* End Feature Area */}
      {/* Service area start */}
      <div className="service-area service-area-2 bg-dark-1">
        <div className="container">
          <div className="row">
            {/* <div className="col-xl-12 col-lg-12 col-md-12">
              <div className="text-inner">
                <div className="text-service white-headline">
                  <p className="top-head">Best services</p>
                  <h2> our  services</h2>
                  <p>
                    Dummy text is also used to demonstrate the appearance of
                    different. consultants opt in to the projects .Dummy text is
                    also used to demonstrate the appearance of different.
                    consultants opt in to the projects
                  </p>
                </div>
              </div>
            </div> */}
            {/* single-service end*/}
            {data.map((item, index) => (
              <div className="col-xl-12 col-lg-12 col-md-12 pt-5">
                  <h2 className="text-white text-center"> Our  services</h2>
                <div className="single-service-inner">
                  <div className="single-service">
                    {/* <div className="service-img">
                <img src="/assets/img/icon/p1.png" alt="" />
              </div> */}
                    <div className="service-content">
                      <h4>
                        <Link to={"/"}>{item.name}</Link>
                      </h4>
                      <p>{item.description}</p>
                      <p id="servicePrice">{item.price}</p>
                      <br />
                      <p id="servicePrice">
                        <Link
                          to={`/service-detail/${item.id}`}
                          id="submit"
                          className="anti-btn quote-btn p-2"
                        >
                          Service detail
                        </Link>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>
      {/* Service area End */}
      {/* Start Quote Area */}
      <div className="quote-area area-padding ">
        <div className="container">
          <div className="row quote-center d-flex align-items-center">
            <div className="col-xl-5 col-lg-5 col-md-12">
              <div className="quote-image">
                <div className="sub-head">
                  <h4>Contact us for services</h4>
                  <div className="single-contact">
                    <Link to={""}>
                      <i className="fa fa-phone" />
                      <span>+44-0022-222</span>
                    </Link>
                    <Link to={""}>
                      <i className="fa fa-envelope" />
                      <span>info@gmail.com</span>
                    </Link>
                    <Link to={""}>
                      <i className="fa fa-map" />
                      <span>Road-7 old Street London, England</span>
                    </Link>
                  </div>
                </div>
              </div>
            </div>
            <div className="col-xl-7 col-lg-7 col-md-12">
              <div className="quote-all">
                <form
                  id="contactForm"
                  method="POST"
                  action="contact.php"
                  className="contact-form"
                >
                  <div className="row">
                    <div className="col-xl-6 col-lg-6 col-md-6">
                      <input
                        type="text"
                        id="name"
                        className="form-control"
                        placeholder="Name"
                        required=""
                        data-error="Please enter your name"
                      />
                      <div className="help-block with-errors" />
                      <input
                        type="email"
                        className="email form-control"
                        id="email"
                        placeholder="Email"
                        required=""
                        data-error="Please enter your email"
                      />
                      <div className="help-block with-errors" />
                      <input
                        type="text"
                        id="msg_subject"
                        className="form-control last-part"
                        placeholder="Subject"
                        required=""
                        data-error="Please enter your message subject"
                      />
                      <div className="help-block with-errors last-part" />
                    </div>
                    <div className="col-xl-6 col-lg-6 col-md-6">
                      <textarea
                        id="message"
                        rows={7}
                        placeholder="Massage"
                        className="form-control"
                        required=""
                        data-error="Write your message"
                        defaultValue={""}
                      />
                      <div className="help-block with-errors" />
                      <button
                        type="submit"
                        id="submit"
                        className=" anti-btn quote-btn"
                      >
                        Submit
                      </button>
                      <div id="msgSubmit" className="h3 text-center hidden" />
                      <div className="clearfix" />
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      {/* End Quote Area */}
    </>
  );
};

export default Service;
