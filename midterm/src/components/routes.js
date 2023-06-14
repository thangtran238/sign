import AddPage from "./AddPage";
import AdminPage from "./AdminPage";
import ProductPage from "./ProductPage";
import SignIn from "./SignIn";
import SignUp from "./SignUp";

export const routes = [
  {
    path: '/',
    element: <ProductPage />,
    index : true
  },
  {
    path: '/add',
    element: <AddPage />,
    index : false
  },
  {
    path: '/admin',
    element: <AdminPage />,
    index: false
  },
  {
    path:'/signup',
    element: <SignUp />,
    index: false
  },
  {
    path:'/signin',
    element: <SignIn />,
    index: false
  }
]