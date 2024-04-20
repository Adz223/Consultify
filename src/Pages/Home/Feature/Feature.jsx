import React from 'react'
// import { FaChalkboardUser } from "react-icons/fa6";
// import { FaChartLine } from "react-icons/fa6";
// import { Link } from 'react-router-dom';

const Feature = () => {
  return (
    <>
    {/* Start Feature Area */}
    <div className="feature-area fix area-padding">
      <div className="container">
        <div className="row d-flex align-items-center">
          <div className="col-xl-6 col-lg-6 col-md-12">
            <div className="feature-content">
              <div className="feature-images">
                <img src="/assets/img/feature/vd.jpg" alt="" className="first-img" />
                <img src="/assets/img/feature/sd.jpg" alt="" className="over-img" />
              </div>
            </div>
          </div>
          <div className="col-xl-6 col-lg-6 col-md-12">
            <div className="feature-all">
              <div className="left-headline">
                <p className="top-head">About us</p>
                <h2> Revolutionizing Business Consulting</h2>
                <p>
                Consultify is an innovative digital platform designed to revolutionize business consulting by enhancing communication between businesses and expert consultants. 
                </p>
              </div>
              {/* about single */}
              <div
                className="support-services wow fadeInUp"
                data-wow-delay="0.3s"
              >
                {/* <Link className="support-images" to={"#"}>
                  {/* <i className="flaticon-073-speech" /> 
                  <FaChalkboardUser />
                </Link> */}
                  <p>
                  It addresses the common problem of slow and inefficient communication in traditional consulting
                  </p>
                {/* <div className="support-content"> */}
                  {/* <h4>Online Support</h4> */}
                {/* </div> */}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {/* End Feature Area */}
  </>
  
  )
}

export default Feature