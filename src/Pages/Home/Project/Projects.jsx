import React from "react";
import { BsBoxArrowInUpRight } from "react-icons/bs";
import { Link } from "react-router-dom";

const Projects = () => {
  return (
    <>
      {/* Start project Area */}
      <div className="project-area project-area-2 area-padding">
        <div className="container">
          <div className="row">
            <div className="col-xl-12 col-lg-12 col-md-12">
              <div className="left-headline full-left">
                <p className="top-head">Case study</p>
                <h2>Our Projects</h2>
              </div>
            </div>
          </div>
          <div className="row">
            <div className="col-xl-4 col-lg-4 col-md-6">
              <div className="single-awesome-project">
                <div className="awesome-img">
                <Link to={""}>
                    <img src="https://www.betterteam.com/images/it-consultant-job-description-4088x2725-2020123.jpeg?crop=21:16,smart&width=420&dpr=2&format=pjpg&auto=webp&quality=85" alt="" />
                  </Link>
                  <div className="add-actions text-center">
                    <Link
                      className="venobox vbox-item"
                      data-gall="myGallery"
                      target="_blank"
                      href="https://www.betterteam.com/images/it-consultant-job-description-4088x2725-2020123.jpeg?crop=21:16,smart&width=420&dpr=2&format=pjpg&auto=webp&quality=85"
                    >
                      <BsBoxArrowInUpRight  className="port-icon ti-zoom-in" />
                      {/* <i className="port-icon ti-zoom-in" /> */}
                    </Link>
                  </div>
                </div>
                <div className="project-dec">
                <Link to={""}>
                    {/* <h4>Our-Services</h4> */}
                  </Link>
                </div>
              </div>
            </div>
            {/* single-awesome-project start */}
            <div className="col-xl-4 col-lg-4 col-md-6">
              <div className="single-awesome-project">
                <div className="awesome-img">
                <Link to={""}>
                    <img src="https://flowroute.com/wp-content/uploads/2023/06/close-up-robot-humanoid-digital-art-fantasy-art-anime-generative-ai.jpg" alt="" />
                  </Link>
                  <div className="add-actions text-center">
                    <Link
                      className="venobox vbox-item"
                      data-gall="myGallery"
                      target="_blank"
                      href="https://flowroute.com/wp-content/uploads/2023/06/close-up-robot-humanoid-digital-art-fantasy-art-anime-generative-ai.jpg"
                    >
                   <BsBoxArrowInUpRight  className="port-icon ti-zoom-in" />
                      {/* <i className="port-icon ti-zoom-in" /> */}
                    </Link>
                  </div>
                </div>
                <div className="project-dec">
                <Link to={""}>
                    {/* <h4>Mobile apps</h4> */}
                  </Link>
                </div>
              </div>
            </div>
            {/* single-awesome-project end */}
            <div className="col-xl-4 col-lg-4 col-md-6">
              <div className="single-awesome-project">
                <div className="awesome-img">
                <Link to={""}>
                    <img src="https://static.vecteezy.com/system/resources/thumbnails/012/287/161/small_2x/consulting-male-advisor-pointed-to-company-financials-documents-to-restructure-profitability-of-female-entrepreneurs-photo.jpg" alt="" />
                  </Link>
                  <div className="add-actions text-center">
                    <Link
                      className="venobox vbox-item"
                      data-gall="myGallery"
                      target="_blank"
                      href="https://static.vecteezy.com/system/resources/thumbnails/012/287/161/small_2x/consulting-male-advisor-pointed-to-company-financials-documents-to-restructure-profitability-of-female-entrepreneurs-photo.jpg"
                    >
                      <BsBoxArrowInUpRight  className="port-icon ti-zoom-in" />{
                      /* <i className="port-icon ti-zoom-in" /> */}
                    </Link>
                  </div>
                </div>
                <div className="project-dec">
                <Link to={""}>
                    {/* <h4>Web development</h4> */}
                  </Link>
                </div>
              </div>
            </div>
            {/* single-awesome-project end */}
            <div className="d-lg-none d-xl-none col-md-6 ">
              <div className="single-awesome-project">
                <div className="awesome-img">
                <Link to={""}>
                    <img src="/assets/img/project/p4.jpg" alt="" />
                  </Link>
                  <div className="add-actions text-center">
                    <Link
                      className="venobox vbox-item"
                      data-gall="myGallery"
                      target="_blank"
                      href="/assets/img/project/p4.jpg"
                    >
                      <BsBoxArrowInUpRight  className="port-icon ti-zoom-in" />{/*
                       <i className="port-icon ti-zoom-in" /> */}
                    </Link>
                  </div>
                </div>
                <div className="project-dec">
                <Link to={""}>
                    {/* <h4>Software solution</h4> */}
                  </Link>
                </div>
              </div>
            </div>
            {/* single-awesome-project end */}
          </div>
        </div>
      </div>
      {/* project area End */}
    </>
  );
};

export default Projects;
