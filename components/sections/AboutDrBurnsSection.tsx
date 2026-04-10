"use client";

import { motion } from "framer-motion";
import SectionLabel from "@/components/ui/SectionLabel";
import { drBurnsBio } from "@/lib/constants";

export default function AboutDrBurnsSection() {
  return (
    <section id="about" className="py-20 md:py-24 bg-[#F0F5F4]">
      <div className="max-w-[1200px] mx-auto px-6">
        {/* Header */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.5 }}
          className="text-center mb-14"
        >
          <SectionLabel>MEET THE SPECIALIST</SectionLabel>
          <h2 className="font-[family-name:var(--font-playfair)] text-3xl md:text-4xl text-charcoal mt-3">
            {drBurnsBio.name}
          </h2>
        </motion.div>

        {/* Bio + Photo */}
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
          {/* Left — Bio */}
          <motion.div
            initial={{ opacity: 0, x: -20 }}
            whileInView={{ opacity: 1, x: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.5 }}
          >
            <p className="text-dark-slate leading-relaxed text-base">
              {drBurnsBio.bio}
            </p>

            {/* Credential Badges */}
            <div className="flex flex-wrap gap-3 mt-8">
              {drBurnsBio.credentials.map((credential, i) => (
                <span
                  key={i}
                  className="inline-block border border-teal text-teal text-xs font-semibold uppercase tracking-wider px-4 py-2 rounded-full"
                >
                  {credential}
                </span>
              ))}
            </div>
          </motion.div>

          {/* Right — Photo Placeholder */}
          <motion.div
            initial={{ opacity: 0, x: 20 }}
            whileInView={{ opacity: 1, x: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.5, delay: 0.1 }}
          >
            <div
              className="bg-slate-200 rounded-xl flex items-center justify-center text-slate-400 text-sm w-full"
              style={{ aspectRatio: "5/6" }}
            >
              Dr. Burns — Casual Photo
            </div>
          </motion.div>
        </div>

        {/* Testimonial Quote Block */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.5, delay: 0.2 }}
          className="mt-16 max-w-3xl mx-auto text-center"
        >
          <div className="relative">
            {/* Large teal quote mark */}
            <span className="font-[family-name:var(--font-playfair)] text-8xl text-teal/30 absolute -top-8 left-1/2 -translate-x-1/2 leading-none select-none">
              &ldquo;
            </span>
            <blockquote className="pt-8">
              <p className="font-[family-name:var(--font-playfair)] text-xl md:text-2xl text-charcoal italic leading-relaxed">
                {drBurnsBio.testimonial.quote}
              </p>
              <cite className="block text-warm-gray text-sm mt-4 not-italic">
                &mdash; {drBurnsBio.testimonial.author}
              </cite>
            </blockquote>
          </div>
        </motion.div>
      </div>
    </section>
  );
}
