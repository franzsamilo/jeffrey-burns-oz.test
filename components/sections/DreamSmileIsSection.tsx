"use client";

import { motion } from "framer-motion";
import { dreamSmileBenefits } from "@/lib/constants";

export default function DreamSmileIsSection() {
  return (
    <section className="py-20 md:py-24 bg-white">
      <div className="max-w-[1200px] mx-auto px-6">
        {/* Header */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.5 }}
          className="text-center mb-16"
        >
          <h2 className="font-[family-name:var(--font-playfair)] text-3xl md:text-4xl text-charcoal mb-4">
            The DreamSmile is...
          </h2>
          <p className="text-warm-gray max-w-2xl mx-auto text-lg">
            A healthy, beautiful, natural functioning and looking smile using
            dental implants.
          </p>
          <p className="mt-4 text-lg">
            Say goodbye to{" "}
            <span className="line-through text-coral">hiding your mouth</span>{" "}
            and say <strong>hello to...</strong>
          </p>
        </motion.div>

        {/* Zigzag Benefit Rows */}
        <div className="space-y-16 md:space-y-24">
          {dreamSmileBenefits.map((benefit, i) => (
            <motion.div
              key={i}
              initial={{ opacity: 0, y: 30 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.5 }}
              className={`flex flex-col gap-8 items-center ${
                benefit.imagePosition === "left"
                  ? "md:flex-row"
                  : "md:flex-row-reverse"
              }`}
            >
              {/* Image Placeholder */}
              <div className="w-full md:w-1/2">
                <div
                  className="bg-slate-200 rounded-xl flex items-center justify-center text-slate-400 text-sm w-full"
                  style={{ aspectRatio: "500/350" }}
                >
                  Benefit Image
                </div>
              </div>

              {/* Text */}
              <div className="w-full md:w-1/2 flex flex-col justify-center">
                <div className="relative">
                  <div className="w-12 h-1 bg-teal rounded-full mb-4" />
                  <h3 className="font-[family-name:var(--font-playfair)] text-2xl md:text-3xl text-charcoal">
                    {benefit.text}
                  </h3>
                </div>
              </div>
            </motion.div>
          ))}
        </div>

        {/* Transition heading */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.5 }}
          className="text-center mt-20 md:mt-28"
        >
          <h2 className="font-[family-name:var(--font-playfair)] text-2xl md:text-3xl text-charcoal italic">
            Can You See Yourself with Your DreamSmile?
          </h2>
        </motion.div>
      </div>
    </section>
  );
}
