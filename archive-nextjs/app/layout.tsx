import type { Metadata } from "next";
import { Playfair_Display, Montserrat, Dancing_Script } from "next/font/google";
import "./globals.css";

const playfair = Playfair_Display({
  subsets: ["latin"],
  variable: "--font-playfair",
  display: "swap",
});

const montserrat = Montserrat({
  subsets: ["latin"],
  variable: "--font-montserrat",
  display: "swap",
});

const dancingScript = Dancing_Script({
  subsets: ["latin"],
  variable: "--font-dancing-script",
  display: "swap",
});

export const metadata: Metadata = {
  title: "DreamSmile by Dr. Jeffrey S. Burns, DDS — Dental Implants",
  description:
    "A Dream Smile You Never Have to Hide. 30+ years of dental implant experience. Schedule your free consultation with Dr. Burns today.",
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html
      lang="en"
      className={`${playfair.variable} ${montserrat.variable} ${dancingScript.variable}`}
    >
      <body className="antialiased">{children}</body>
    </html>
  );
}
