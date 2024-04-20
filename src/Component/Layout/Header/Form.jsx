import React, { useState } from "react";
import {useFormik } from "formik";
import Modal from "react-bootstrap/Modal";
import axios from "axios";
import * as Yup from "yup";
import "../Header/Form.css";
import { Link } from "react-router-dom";
import BaseUrl from "../../../Auth/BaseUrl";
import Swal from "sweetalert2";

const FormSchema = Yup.object().shape({
  first_name: Yup.string().required("First Name is required"),
  last_name: Yup.string().required("Last Name is required"),
  email: Yup.string().email("Invalid email").required("Email is required"),
  password: Yup.string().required("Password is required"),
});
const FormSchemaLogin = Yup.object().shape({
  email: Yup.string().email("Invalid email").required("Email is required"),
  password: Yup.string().required("Password is required"),
});
const iniailValue ={
  first_name: "",
  last_name: "",
  email: "",
  password: "",
}
const iniailValueLogin ={
  email: "",
  password: "",
}
const Form = ({ show, handleClose,setShow }) => {
  const [activeTab, setActiveTab] = useState("login");

  
  const handleTabChange = (tab) => {
    setActiveTab(tab);
  };
  const {values,errors,handleChange,handleBlur,handleSubmit}= useFormik({
    initialValues:activeTab==="login"?iniailValueLogin:iniailValue,
    validationSchema:activeTab==="login"?FormSchemaLogin:FormSchema,
    onSubmit:(values)=>{
      console.log(values,'FormSchema')
        const config = {
          method: "POST",
          url: `${BaseUrl.baseurl}${activeTab==="login"?"login":"signup"}`,
          data: values,
          headers: {
        Accept: "application/json",
      },
    };
    axios(config)
      .then(function (response) {
        console.log(response.data.accessToken,'response');
        localStorage.setItem("token",response.data.accessToken)
        if(response.status===200){
          Swal.fire({
            showCloseButton: true,
            toast: true,
            icon: "success",
            title: "success",
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
        }
        window.location.reload()
        setShow(false)
      })
      .catch((error) => {
        console.log( error?.response?.data?.message, "eroors===>");
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
        setShow(false)        // Handle error response
      });
    }
  })
  return (
    <div>
      {show && (
        <Modal show={show} onHide={handleClose}>
          <Modal.Body className="roundedcircle20">
            <>
              {/* FORMULAIRE DE CONNEXION */}
              <Modal.Header closeButton className="border-0"></Modal.Header>
              <div className="card">
                <h2>{activeTab === "login" ? "Login" : "Signup"} Form</h2>
                <div className="login_register">
                  <Link
                    to="#"
                    className={`login ${
                      activeTab === "login" ? "login_active" : ""
                    }`}
                    onClick={() => handleTabChange("login")}
                  >
                    Login
                  </Link>
                  <Link
                    to="#"
                    className={`register ${
                      activeTab === "register" ? "login_active" : ""
                    }`}
                    onClick={() => handleTabChange("register")}
                  >
                    Signup
                  </Link>
                </div>
                <form className="form" onSubmit={handleSubmit}>
                  {activeTab === "register" && (
                    <>
                      <input
                        type="text"
                        autoComplete="off"
                        placeholder="First Name"
                        className="first_name mb-3"
                        name="first_name"
                        value={values?.first_name}
                        onChange={handleChange}
                        onBlur={handleBlur}
                      />
                      {errors?.first_name && (
                        <div className="text-danger">{errors?.first_name}</div>
                      )}
                      <input
                        type="text"
                        autoComplete="off"
                        placeholder="Last Name"
                        className="last_name mb-3"
                        name="last_name"
                        value={values?.last_name}
                        onChange={handleChange}
                        onBlur={handleBlur}
                      />
                      {errors?.last_name && (
                        <div className="text-danger">{errors?.last_name}</div>
                      )}
                      <input
                    type="email"
                    autoComplete="off"
                    placeholder="Email Address"
                    className="email"
                    name="email"
                    value={values?.email}
                    onChange={handleChange}
                    onBlur={handleBlur}
                  />
                  {errors?.email && (
                    <div className="text-danger">{errors?.email}</div>
                  )}
                  <input
                    type="password"
                    autoComplete="off"
                    placeholder="Password"
                    className="pass"
                    name="password"
                    value={values?.password}
                    onChange={handleChange}
                    onBlur={handleBlur}
                  />
                  {errors?.password && (
                    <div className="text-danger">{errors?.password}</div>
                  )}
                    </>
                  )}
                  {activeTab === "login" ? (
                    <>
                  <input
                    type="email"
                    autoComplete="off"
                    placeholder="Email Address"
                    className="email"
                    name="email"
                    value={values?.email}
                    onChange={handleChange}
                    onBlur={handleBlur}
                  />
                  {errors?.email && (
                    <div className="text-danger">{errors?.email}</div>
                  )}
                  <input
                    type="password"
                    autoComplete="off"
                    placeholder="Password"
                    className="pass"
                    name="password"
                    value={values?.password}
                    onChange={handleChange}
                    onBlur={handleBlur}
                  />
                  {errors?.password && (
                    <div className="text-danger">{errors?.password}</div>
                  )}
                    <Link to="#" className="fp">
                      Forgot password?
                    </Link>
                    </>
                  ) : null}
                  <button
                    type="button"
                    onClick={handleSubmit}
                    className="login_btn"
                  >
                    {activeTab === "register" ? "Signup" : "Login"}
                  </button>
                </form>
              </div>
            </>
          </Modal.Body>
        </Modal>
      )}
    </div>
  );
};

export default Form;
