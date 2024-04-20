import React from 'react'
import { Link } from 'react-router-dom'

const Welcome = () => {
  return (
    <>
  {/* Start Welcome area */}
  <div className="welcome-service" id='Contact'>
    <div className="container">
      <div className="row d-flex align-items-center">
        {/* <div className="col-xl-5 col-lg-5 col-md-12">
          <div className="left-headline">
            <p className="top-head">What we do?</p>
            <h2>We provide best services</h2>
            <p>
              But I must explain to you how all this mistaken idea of denouncing
              pleasure and praising pain.{" "}
            </p>
          </div>
        </div> */}
        <div className="col-xl-12 col-lg-12 col-md-12 wel-service-inner">
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
                    Explore our of consulting services tailored for your business needs.{" "}
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
                  <p>
                    Discover export consultants ready to assist you.
                  </p>
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
                  <p>
                    Get in touch for more information.
                  </p>
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
</>

  )
}

export default Welcome