import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import {
  createBrowserRouter,
  RouterProvider,
  type LoaderFunction,
  type ActionFunction,
} from "react-router-dom";
import Page404 from './404';

interface IRoute {
  path: string;
  Element: JSX.Element;
  loader?: LoaderFunction;
  action?: ActionFunction;
  ErrorBoundary?: JSX.Element;
}

// @ts-ignore
const pages = import.meta.glob("./pages/**/*.tsx", { eager: true });

const routes: IRoute[] = [];
for (const path of Object.keys(pages)) {
  const fileName = path.match(/\.\/pages\/(.*)\.tsx$/)?.[1];
  if (!fileName) {
    continue;
  }

  const normalizedPathName = fileName.includes("$")
    ? fileName.replace("$", ":")
    : fileName.replace(/\/index/, "");

  routes.push({
    path: fileName === "index" ? "/" : `/${normalizedPathName.toLowerCase()}`,
    // @ts-ignore
    Element: pages[path].default,
    // @ts-ignore
    loader: pages[path]?.loader,
    // @ts-ignore
    action: pages[path]?.action,
    // @ts-ignore
    ErrorBoundary: pages[path]?.ErrorBoundary ?? Page404,
  });
}

const router = createBrowserRouter(
  routes.map(({ Element, ErrorBoundary, ...rest }) => ({
    ...rest,
    // @ts-ignore
    element: <Element />,
    // @ts-ignore
    ...(ErrorBoundary && { errorElement: <ErrorBoundary /> }),
  }))
);

export default ReactDOM.createRoot(document.body).render(
  <React.StrictMode>
    <header className='fixed top-8 max-sm:top-4 z-[999] flex w-full max-w-screen-2xl left-2/4 -translate-x-2/4 flex-wrap px-4'>
    </header>
    <main className='pt-32'>
      <RouterProvider router={router} />
    </main>
  </React.StrictMode>,
);