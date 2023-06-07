import AddPage from "./AddPage";
import AdminPage from "./AdminPage";
import ProductPage from "./ProductPage";

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
  }
]