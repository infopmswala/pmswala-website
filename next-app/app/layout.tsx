import type { Metadata } from "next";
import Script from "next/script";
import "./styles.css";

export const metadata: Metadata = {
  title: "PMSWALA",
  description: "PMSWALA portfolio management services"
};

export default function RootLayout({ children }: { children: React.ReactNode }) {
  return (
    <html lang="en">
      <head>
        <link rel="shortcut icon" type="image/x-icon" href="/assets/frontend/img/logo/logo.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossOrigin="" />
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet" />
        <link href="/assets/frontend/css/bootstrap.min.css" rel="stylesheet" />
        <link href="/assets/frontend/css/all.min.css" rel="stylesheet" />
        <link href="/assets/frontend/css/animate.css" rel="stylesheet" />
        <link href="/assets/frontend/css/themify-icons.css" rel="stylesheet" />
        <link href="/assets/frontend/css/icofont.min.css" rel="stylesheet" />
        <link href="/assets/frontend/css/flaticon.css" rel="stylesheet" />
        <link href="/assets/frontend/css/bootstrap-icons.css" rel="stylesheet" />
        <link href="/assets/frontend/css/bsnav.min.css" rel="stylesheet" />
        <link href="/assets/frontend/css/preloader.css" rel="stylesheet" />
        <link href="/assets/frontend/css/magnific-popup.css" rel="stylesheet" />
        <link href="/assets/frontend/css/swiper-bundle.min.css" rel="stylesheet" />
        <link href="/assets/frontend/css/jquery-ui.css" rel="stylesheet" />
        <link href="/assets/frontend/style.css" rel="stylesheet" />
        <link href="/assets/frontend/css/responsive.css" rel="stylesheet" />
      </head>
      <body id="bdy">
        {children}
        <Script src="/assets/frontend/js/jquery-3.7.0.min.js" strategy="beforeInteractive" />
        <Script src="/assets/frontend/js/popper.min.js" strategy="afterInteractive" />
        <Script src="/assets/frontend/js/bootstrap.min.js" strategy="afterInteractive" />
        <Script src="/assets/frontend/js/bsnav.min.js" strategy="afterInteractive" />
        <Script src="/assets/frontend/js/jquery.magnific-popup.min.js" strategy="afterInteractive" />
        <Script src="/assets/frontend/js/isotope.pkgd.min.js" strategy="afterInteractive" />
        <Script src="/assets/frontend/js/imagesloaded.pkgd.min.js" strategy="afterInteractive" />
        <Script src="/assets/frontend/js/wow.min.js" strategy="afterInteractive" />
        <Script src="/assets/frontend/js/count-to.js" strategy="afterInteractive" />
        <Script src="/assets/frontend/js/progress-bar.min.js" strategy="afterInteractive" />
        <Script src="/assets/frontend/js/jquery.easypiechart.js" strategy="afterInteractive" />
        <Script src="/assets/frontend/js/typed.js" strategy="afterInteractive" />
        <Script src="/assets/frontend/js/YTPlayer.min.js" strategy="afterInteractive" />
        <Script src="/assets/frontend/js/jquery.appear.js" strategy="afterInteractive" />
        <Script src="/assets/frontend/js/jquery.easing.min.js" strategy="afterInteractive" />
        <Script src="/assets/frontend/js/swiper-bundle.min.js" strategy="afterInteractive" />
        <Script src="/assets/frontend/js/active-class.js" strategy="afterInteractive" />
        <Script src="/assets/frontend/js/jquery-ui.min.js" strategy="afterInteractive" />
        <Script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js" strategy="afterInteractive" />
        <Script src="/assets/frontend/js/main.js" strategy="afterInteractive" />
      </body>
    </html>
  );
}
