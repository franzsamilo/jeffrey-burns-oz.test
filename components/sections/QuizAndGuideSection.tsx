"use client";

import { useState } from "react";
import { motion } from "framer-motion";
import Button from "@/components/ui/Button";
import { quizOptions, quizContent, guideContent } from "@/lib/constants";

export default function QuizAndGuideSection() {
  const [selected, setSelected] = useState<number | null>(null);

  return (
    <section id="quiz" className="bg-[#F5F5F3] py-20 md:py-24">
      <div className="max-w-[1200px] mx-auto px-6">
        <div className="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
          {/* Quiz Card */}
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.5 }}
            className="bg-white rounded-xl p-8 shadow-sm"
          >
            <span className="font-[family-name:var(--font-montserrat)] text-xs font-semibold uppercase tracking-widest text-warm-gray">
              {quizContent.label}
            </span>
            <h3 className="font-[family-name:var(--font-montserrat)] text-lg font-bold text-charcoal mt-1 mb-2">
              {quizContent.title}
            </h3>
            <p className="text-sm text-warm-gray mb-4">
              {quizContent.subtitle}
            </p>
            <p className="font-[family-name:var(--font-montserrat)] font-semibold text-charcoal mb-4">
              {quizContent.question}
            </p>

            <fieldset className="space-y-3">
              <legend className="sr-only">{quizContent.question}</legend>
              {quizOptions.map((option, i) => (
                <label
                  key={i}
                  className={`flex items-center gap-3 p-3 rounded-lg border cursor-pointer transition-colors ${
                    selected === i
                      ? "border-teal bg-teal/5"
                      : "border-gray-200 hover:border-teal/50"
                  }`}
                >
                  <input
                    type="radio"
                    name="quiz"
                    value={option}
                    checked={selected === i}
                    onChange={() => setSelected(i)}
                    className="accent-[#7FB5B0] w-4 h-4"
                  />
                  <span className="text-sm text-dark-slate">{option}</span>
                </label>
              ))}
            </fieldset>

            <div className="flex justify-end mt-6">
              <Button variant="solid" className="text-xs px-6 py-2">
                {quizContent.nextButton}
              </Button>
            </div>
          </motion.div>

          {/* Book Cover Placeholder */}
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.5, delay: 0.15 }}
            className="hidden lg:flex justify-center"
          >
            <div
              className="bg-slate-200 rounded-lg flex items-center justify-center text-slate-400 text-sm shadow-lg p-4 text-center"
              style={{ width: 260, height: 370 }}
            >
              {guideContent.bookTitle}
            </div>
          </motion.div>

          {/* Guide CTA Card */}
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.5, delay: 0.3 }}
            className="bg-white rounded-xl p-8 shadow-sm flex flex-col justify-center text-center"
          >
            <h3 className="font-[family-name:var(--font-montserrat)] text-sm font-bold uppercase tracking-wider text-charcoal mb-3">
              {guideContent.heading}
            </h3>
            <p className="text-sm text-warm-gray mb-6">
              {guideContent.subheading}
            </p>
            <Button variant="outlined">{guideContent.cta}</Button>
          </motion.div>
        </div>
      </div>
    </section>
  );
}
