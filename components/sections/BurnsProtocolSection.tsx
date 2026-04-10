"use client";

import { motion } from "framer-motion";
import SectionLabel from "@/components/ui/SectionLabel";
import { burnsProtocolSteps } from "@/lib/constants";

export default function BurnsProtocolSection() {
  return (
    <section className="py-20 md:py-24 bg-charcoal text-white">
      <div className="max-w-[1200px] mx-auto px-6">
        {/* Header */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.5 }}
          className="text-center mb-6"
        >
          <SectionLabel>YOUR JOURNEY</SectionLabel>
          <h2 className="font-[family-name:var(--font-playfair)] text-3xl md:text-4xl text-white mt-3">
            The Burns Protocol
          </h2>
          <p className="text-white/60 max-w-2xl mx-auto mt-4">
            Our proprietary 6-step process has been nationally recognized for
            delivering predictable, beautiful, and lasting results.
          </p>
          <div className="mt-4">
            <span className="inline-block bg-teal/20 text-teal-light text-xs font-semibold uppercase tracking-widest px-4 py-1.5 rounded-full border border-teal/30">
              NATIONALLY RECOGNIZED PROTOCOL
            </span>
          </div>
        </motion.div>

        {/* Content: Photo + Timeline */}
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 mt-14">
          {/* Left — Dr. Burns Photo Placeholder */}
          <motion.div
            initial={{ opacity: 0, x: -20 }}
            whileInView={{ opacity: 1, x: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.5 }}
            className="hidden lg:block"
          >
            <div
              className="bg-slate-700 rounded-xl flex items-center justify-center text-slate-500 text-sm w-full sticky top-24"
              style={{ aspectRatio: "3/4" }}
            >
              Dr. Burns — Surgical Photo
            </div>
          </motion.div>

          {/* Right — 6-step timeline */}
          <div className="space-y-8">
            {burnsProtocolSteps.map((step, i) => (
              <motion.div
                key={i}
                initial={{ opacity: 0, x: 20 }}
                whileInView={{ opacity: 1, x: 0 }}
                viewport={{ once: true }}
                transition={{ duration: 0.4, delay: i * 0.08 }}
                className="flex gap-5"
              >
                {/* Step Number */}
                <div className="shrink-0 w-10 h-10 rounded-full border-2 border-teal flex items-center justify-center text-teal font-bold text-sm">
                  {step.number}
                </div>

                {/* Step Content */}
                <div>
                  <h3 className="font-semibold text-white text-lg">
                    {step.title}
                  </h3>
                  <p className="text-white/60 text-sm mt-1 leading-relaxed">
                    {step.description}
                  </p>
                  <a
                    href="#quiz"
                    className="inline-block text-teal text-xs font-semibold uppercase tracking-wider mt-2 hover:text-teal-light transition-colors"
                  >
                    SCHEDULE YOUR FREE ASSESSMENT &rarr;
                  </a>
                </div>
              </motion.div>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}
