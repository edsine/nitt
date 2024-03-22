const YearOptions = () => {
  const currentYear = new Date().getFullYear();
  const yearsArray = [];

  for (let index = parseInt(currentYear); index >= 1981; index--) {
    yearsArray.push(index);
  }

  return (
    <>
      {yearsArray.map((year, index) => {
        return (
          <option key={index} value={year}>
            {year}
          </option>
        );
      })}
    </>
  );
};

export default YearOptions;
