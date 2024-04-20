import React, { useState, useEffect } from "react";
import { FaBars } from "react-icons/fa6";
import { Link, useNavigate } from "react-router-dom";

const Header = ({ handleShow }) => {
  const navigate = useNavigate();
  const token = localStorage.getItem("token");

  const [isNavbarOpen, setIsNavbarOpen] = useState(false);
  const [isScrolled, setIsScrolled] = useState(false);

  useEffect(() => {
    const handleScroll = () => {
      if (window.scrollY > 0) {
        setIsScrolled(true);
      } else {
        setIsScrolled(false);
      }
    };

    window.addEventListener("scroll", handleScroll);

    return () => {
      window.removeEventListener("scroll", handleScroll);
    };
  }, []);

  const toggleNavbar = () => {
    setIsNavbarOpen(!isNavbarOpen);
  };

  const handleShowLogout = () => {
    localStorage.clear();
    window.location.reload();
    navigate("/");
  };

  return (
    <>
      <header className={`header-one header-one1 ${isScrolled ? 'scrolled' : ''}`}>
        <div
          id="sticker"
          className="header-area header-area-2 header-area-3 header-one1"
        ></div>
        <nav
          className={`navbar navbar-expand-lg fixed-top ${isScrolled ? 'scrolled' : ''}`}
          id="ResponsiveCssNav2"
        >
          <div className="container-fluid">
            <Link className="navbar-brand navImage2" to={"/"}>
              <img
                src="/assets/img/logo/logo4.png"
                alt=""
                width="100%"
                height="100%"
              />
            </Link>
            <button
              className="navbar-toggler text-white"
              type="button"
              data-bs-toggle="collapse"
              onClick={toggleNavbar}
              aria-controls="navbarSupportedContent"
              aria-expanded={isNavbarOpen ? "true" : "false"}
              aria-label="Toggle navigation"
            >
              <FaBars />
            </button>
            <div
              className={`collapse navbar-collapse ${isNavbarOpen ? 'show' : ''}`}
            >
              <ul className="navbar-nav m-auto mb-2 mb-lg-0">
                <li className="nav-item">
                  <Link
                    className="nav-link text-white fs-5 active fs-5"
                    aria-current="page"
                    to={"/"}
                    // Set background to transparent
                  >
                    Home
                  </Link>
                </li>
                <li className="nav-item">
                  <Link
                    className="nav-link text-white fs-5"
                    to={"/service"}
                    // Set background to transparent
                  >
                    Services
                  </Link>
                </li>
                <li className="nav-item">
                  <Link
                    className="nav-link text-white fs-5"
                    to={"/consultant"}
                    // onClick={() => handleBackgroundColorChange(true)} // Set background to dark
                  >
                    Consultants
                  </Link>
                </li>
                <li className="nav-item">
                  <Link
                    className="nav-link text-white fs-5"
                    to={"/contact"}
                    // Set background to transparent
                  >
                    Contact
                  </Link>
                </li>
              </ul>
              <form className="d-flex">
                {token ? (
                  <Link
                    to={"/"}
                    onClick={handleShowLogout}
                    className="hd-btn anti-btn"
                  >
                    <i style={{ color: "black", fontSize: "20px" }}>
                      {/* <TiMessages /> */}
                    </i>
                    Logout
                  </Link>
                ) : (
                  <Link onClick={handleShow} className="hd-btn anti-btn">
                    Sign up/login
                  </Link>
                )}
              </form>
            </div>
          </div>
        </nav>
      </header>
      {/* Responsive header  */}
    </>
  );
};

export default Header;
