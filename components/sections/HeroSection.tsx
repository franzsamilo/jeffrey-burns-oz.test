"use client";

import { motion } from "framer-motion";
import Button from "@/components/ui/Button";
import CheckItem from "@/components/ui/CheckItem";
import { heroContent } from "@/lib/constants";

export default function HeroSection() {
  return (
    <section className="relative min-h-[90vh] flex items-center overflow-hidden">
      {/* Background placeholder — swap for <Image> when asset ready */}
      <div className="absolute inset-0 bg-gradient-to-br from-charcoal via-charcoal/95 to-charcoal/80" />

      {/* Content */}
      <div className="relative z-10 max-w-[1200px] mx-auto px-6 py-24 md:py-32 w-full">
        <div className="max-w-2xl">
          <motion.h1
            initial={{ opacity: 0, x: -30 }}
            animate={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.6 }}
            className="font-[family-name:var(--font-playfair)] text-4xl md:text-5xl lg:text-6xl text-white leading-tight mb-8"
          >
            {heroContent.headline}{" "}
            <em className="italic">{heroContent.headlineAccent}</em>
          </motion.h1>

          <motion.div
            initial={{ opacity: 0, x: -30 }}
            animate={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.6, delay: 0.2 }}
            className="space-y-4 mb-10"
          >
            {heroContent.bullets.map((bullet, i) => (
              <CheckItem key={i} className="text-white/90">
                {bullet}
              </CheckItem>
            ))}
          </motion.div>

          <motion.div
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.5, delay: 0.4 }}
          >
            <Button href="#quiz">{heroContent.cta}</Button>
          </motion.div>
        </div>
      </div>

      {/* DreamSmile watermark — bottom right */}
      <div className="absolute bottom-8 right-8 z-10">
        <span className="font-[family-name:var(--font-dancing-script)] text-3xl md:text-5xl text-white/10 select-none">
          DreamSmile
        </span>
      </div>
    </section>
  );
}
