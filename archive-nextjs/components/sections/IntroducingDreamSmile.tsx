"use client";

import { motion } from "framer-motion";

const placeholders = [
  "Woman smiling",
  "Young man smiling",
  "Couple smiling",
  "Older man smiling",
];

export default function IntroducingDreamSmile() {
  return (
    <section className="py-20 md:py-24 bg-white">
      <div className="max-w-[1200px] mx-auto px-6">
        {/* Heading */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.5 }}
          className="text-center mb-14"
        >
          <h2 className="font-[family-name:var(--font-playfair)] text-3xl md:text-4xl text-charcoal">
            Introducing The{" "}
            <span className="font-[family-name:var(--font-dancing-script)] text-4xl md:text-5xl text-teal">
              DreamSmile
            </span>
          </h2>
          <p className="font-[family-name:var(--font-montserrat)] text-sm text-warm-gray mt-2">
            by Jeffrey S. Burns DDS
          </p>
        </motion.div>

        {/* Photo Grid */}
        <div className="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
          {placeholders.map((label, i) => (
            <motion.div
              key={i}
              initial={{ opacity: 0, y: 20 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.4, delay: i * 0.1 }}
            >
              <div
                className="bg-slate-200 rounded-xl flex items-center justify-center text-slate-400 text-sm w-full"
                style={{ aspectRatio: "3/4" }}
              >
                {label}
              </div>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
