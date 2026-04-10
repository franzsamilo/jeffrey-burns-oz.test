type CheckItemProps = {
  children: React.ReactNode;
  className?: string;
};

export default function CheckItem({
  children,
  className = "",
}: CheckItemProps) {
  return (
    <div className={`flex items-start gap-3 ${className}`}>
      <div className="mt-1 shrink-0 w-5 h-5 rounded-full bg-teal flex items-center justify-center">
        <svg
          className="w-3 h-3 text-white"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          strokeWidth={3}
        >
          <path
            strokeLinecap="round"
            strokeLinejoin="round"
            d="M5 13l4 4L19 7"
          />
        </svg>
      </div>
      <span className="text-base leading-relaxed">{children}</span>
    </div>
  );
}
