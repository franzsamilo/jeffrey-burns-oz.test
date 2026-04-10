"use client";

import { motion } from "framer-motion";
import { stats } from "@/lib/constants";

const iconMap: Record<string, string> = {
  calendar: "\uD83D\uDCC5",
  award: "\uD83C\uDFC6",
  smile: "\uD83D\uDE01",
};

export default function ExpertiseSection() {
  return (
    <section className="py-20 md:py-24 bg-[#F5F5F3]">
      <div className="max-w-[1200px] mx-auto px-6">
        {/* Header */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.5 }}
          className="text-center mb-12"
        >
          <h2 className="font-[family-name:var(--font-playfair)] text-3xl md:text-4xl text-charcoal italic">
            Nationally Recognized Expertise you can Trust
          </h2>
          <div className="mt-4">
            <span className="inline-block bg-teal-light text-charcoal text-xs font-semibold uppercase tracking-widest px-4 py-1.5 rounded-full">
              AS SEEN ON TV
            </span>
          </div>
        </motion.div>

        {/* Video Placeholder */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.5, delay: 0.1 }}
          className="max-w-3xl mx-auto mb-12"
        >
          <div
            className="bg-slate-300 rounded-xl flex items-center justify-center text-slate-500 text-lg w-full relative overflow-hidden"
            style={{ aspectRatio: "16/9" }}
          >
            <div className="absolute inset-0 bg-charcoal/40" />
            <div className="relative z-10 flex flex-col items-center gap-3">
              <div className="w-16 h-16 rounded-full bg-teal/90 flex items-center justify-center">
                <svg
                  className="w-6 h-6 text-white ml-1"
                  fill="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path d="M8 5v14l11-7z" />
                </svg>
              </div>
              <span className="text-white font-semibold">Watch TV Segment</span>
            </div>
          </div>
        </motion.div>

        {/* Doctor Info */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.5, delay: 0.2 }}
          className="text-center mb-10"
        >
          <h3 className="font-[family-name:var(--font-playfair)] text-xl text-charcoal">
            Dr. Jeffrey S. Burns, DDS
          </h3>
          <p className="text-warm-gray mt-1">
            Changing lives, one{" "}
            <span className="font-[family-name:var(--font-dancing-script)] text-teal text-xl">
              DreamSmile
            </span>{" "}
            at a time
          </p>
        </motion.div>

        {/* Google Rating */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.5, delay: 0.25 }}
          className="flex items-center justify-center gap-3 mb-12"
        >
          <span className="text-2xl font-bold text-charcoal">G</span>
          <span className="text-xl font-bold text-charcoal">5.0</span>
          <div className="flex gap-0.5">
            {[...Array(5)].map((_, i) => (
              <svg
                key={i}
                className="w-5 h-5 text-gold-star"
                fill="currentColor"
                viewBox="0 0 24 24"
              >
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
              </svg>
            ))}
          </div>
          <span className="text-sm text-teal font-semibold cursor-pointer hover:underline">
            Read our reviews
          </span>
        </motion.div>

        {/* Stats Row */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
          {stats.map((stat, i) => (
            <motion.div
              key={i}
              initial={{ opacity: 0, y: 20 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.4, delay: 0.3 + i * 0.1 }}
              className="text-center"
            >
              <div className="text-3xl mb-2">{iconMap[stat.icon]}</div>
              <div className="font-[family-name:var(--font-playfair)] text-3xl font-bold text-charcoal">
                {stat.number}
              </div>
              <div className="font-semibold text-charcoal text-sm uppercase tracking-wider mt-1">
                {stat.label}
              </div>
              <div className="text-warm-gray text-sm mt-1">
                {stat.subtitle}
              </div>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
